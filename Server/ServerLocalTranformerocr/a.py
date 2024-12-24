import numpy as np
import matplotlib.pyplot as plt

# Định nghĩa số điểm lấy mẫu và khoảng tần số
N = 1024
omega = np.linspace(-np.pi, np.pi, N)

# Tính X(omega)
X_omega = 0.5 * np.abs(1 - 2*np.exp(-1j*omega) + np.exp(-2j*omega))

# Vẽ đồ thị
plt.plot(omega, X_omega)
plt.title('Phổ biên độ của x[n]')
plt.xlabel('Tần số ω')
plt.ylabel('|X(ω)|')
plt.grid(True)
plt.show()