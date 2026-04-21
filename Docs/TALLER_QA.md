# 📘 TALLER DE ASEGURAMIENTO DE CALIDAD (QA)
## Ingeniería en Sistemas III 
**Autor:** Michael Barquero  
**Tecnologías:** Laravel · PHPUnit · JMeter  

---

## 🎯 Objetivo del taller

Aplicar técnicas de **Aseguramiento de Calidad (QA)** sobre un sistema en Laravel mediante:
- Pruebas **unitarias**
- Pruebas **de integración**
- Pruebas **de sistema**
- Pruebas **de seguridad**
- Pruebas **de rendimiento (JMeter)**

---
## 📌 Reglas del taller
- Seguir los pasos **en orden**
- No omitir comandos
- Si el resultado no coincide con el esperado → **es un hallazgo QA**
- Documentar evidencias y conclusiones
- Una prueba que falla **también es un resultado válido**

---
# ✅ 1. PRUEBAS UNITARIAS (Laravel / PHPUnit)
## 🎯 Objetivo
Verificar funciones pequeñas y aisladas, **sin UI, sin navegador y sin base de datos**.

---
### ✅ Paso 1 – Verificar PHPUnit
```bash
php artisan test
