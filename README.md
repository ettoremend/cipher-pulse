#  CipherPulse // Surface & Recon Engine

![Python Version](https://img.shields.io/badge/python-3.8%2B-blue.svg)
![PHP Version](https://img.shields.io/badge/php-8.0%2B-777BB4.svg)
![License](https://img.shields.io/badge/license-MIT-green.svg)
![Cybersecurity](https://img.shields.io/badge/domain-Cybersecurity-red.svg)

**CipherPulse** é um painel tático de análise de segurança e auditagem de superfície de ataque (*Attack Surface Management*). Ele combina um motor de reconhecimento em **Python** com um orquestrador **PHP** e uma interface escura estilo **SOC (Security Operations Center)** em **CSS3 (Glassmorphism)**.

---

##  Demonstração / Preview

> *[Adicione aqui uma captura de tela do seu painel rodando]*

---

##  Funcionalidades

- **HTTP Security Headers Audit:** Verifica a presença e configuração de cabeçalhos essenciais (HSTS, CSP, X-Frame-Options, X-Content-Type-Options, Referrer-Policy).
- **Risk Scoring Dynamic Engine:** Algoritmo que calcula uma pontuação de risco (0 a 100) baseada em vulnerabilidades encontradas.
- **Glassmorphism SOC Interface:** Dashboard moderno e responsivo com métricas visuais instantâneas.
- **Back-to-Front Integration:** Execução assíncrona do script Python via subprocessos seguros no PHP.

---

##  Tecnologias Utilizadas

- **Engine (Back-end Analysis):** Python 3, `requests`, `urllib3`
- **Orquestrador Web:** PHP 8.x
- **Front-end / UI:** HTML5, CSS3 Custom Properties (Variables), Flexbox/Grid

---

##  Instalação e Execução

### Pré-requisitos
- Python 3.8+ instalado
- PHP 8.0+ instalado
- Git

### 1. Clonar o repositório
```bash
git clone [https://github.com/SEU-USUARIO/cipher-pulse.git](https://github.com/SEU-USUARIO/cipher-pulse.git)
cd cipher-pulse
