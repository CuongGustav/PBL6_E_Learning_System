"use strict";

const searchBth = document.querySelector('.search');
const inputEl = document.querySelector("form input");

const disContainer = document.querySelector('.disctonary_content');
const partofSeech = document.querySelector('.partofSearchNoun');
const ulEl = document.querySelector(".meanings");
const verbEl = document.querySelector(".verb");
const form = document.querySelector('form');

const API_URL = "https://api.dictionaryapi.dev/api/v2/entries/en/";

searchBth.addEventListener("click", () => {
    if(inputEl.value !== ""){
        searching(inputEl.value);
        inputEl.style.border = "";
        inputEl.value = "";
    }
    else{
        inputEl.style.border = "1px solid pink"; 
    }
});

async function searching(data){
    try {
        const api_data = await fetch(API_URL + data);
        const result = await api_data.json();

        const html = `
                    <div class="section">
                    <h2>${result[0].word}</h2>
                    <p>${result[0].phonetic}</p>
                    </div>`;
      
        disContainer.innerHTML = html;
        partofSeech.textContent = result[0].meanings[0].partOfSpeech;
        
        const li = `  ${result[0].meanings[0].definitions
                                        .map(def => `<li>${def.definition}</li>`)
                                        .join('')}`;
        ulEl.innerHTML = li;
        let partofSpeech2 = `
                            <div class="verbContent">
                                <h3>${result[0].meanings[1].partOfSpeech}</h3>
                                <p>Meaning</p>
                                <ul class="meanings">
                                    ${result[0].meanings[1].definitions
                                        .map(def => `<li>${def.definition}</li>`)
                                        .join('')}
                                </ul>
                            </div>`;

        verbEl.innerHTML = partofSpeech2;
        console.log(result);
    } catch (error) {
        console.log(error);
    }
}

form.addEventListener('submit', (e) =>{
    e.preventDefault();
    searching(inputEl.value);
    inputEl.value = "";
})