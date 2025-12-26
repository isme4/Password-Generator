# 🛡️ GENERATOR v1.0 - Professional Wordlist Engine

**GENERATOR** is a high-performance PHP-based permutation engine designed for cybersecurity professionals and penetration testers. It specializes in creating highly targeted wordlists by analyzing and transforming seed keywords into complex, human-behavioral password patterns without relying on external or random data.



---

## ✨ Key Features
* **Pure Data Logic:** Derived strictly from your input keywords to ensure the wordlist is highly relevant to the target.
* **Heuristic Permutations:** Utilizes advanced human behavioral patterns such as LeetSpeak, CamelCase, and specific separators.
* **Dual Language Interface:** Offers a seamless experience with both English and Arabic CLI support.
* **Stability:** Optimized PHP code with zero syntax errors, tested for stable execution in Linux environments.
* **Custom Expansion:** Dynamically combines and mutates keywords to maximize the probability of a successful match.

---

## 🛠️ How It Works (Logic Engine)
The tool follows a multi-layered synthesis process:
1. **Single Variation:** Applies Lowercase, Uppercase, and Capitalization to each keyword.
2. **LeetSpeak Encoding:** Substitutes specific characters with visually similar numbers (e.g., 'a' to '4', 's' to '5').
3. **Relational Pairing:** Merges multiple keywords using professional delimiters like underscores (`_`), dots (`.`), and hyphens (`-`).
4. **Deep Permutation:** Executes recursive loops to combine up to four keywords into long-form, complex phrases.
5. **Shuffling & Filtering:** Cleans the list from duplicates and randomizes the order to break linear patterns.

---

## 📋 Requirements
To run **GENERATOR**, ensure your system meets the following:
* **Operating System:** Linux (Kali Linux, Parrot OS, Ubuntu) or Android (via Termux).
* **Language:** PHP 7.4 or higher installed.
* **CLI Environment:** Access to a terminal/command line.

* 
⚠️ Disclaimer
This tool is strictly for educational purposes and authorized security auditing. The developer is not responsible for any unauthorized use or damage caused by this tool. Use it ethically.

👨‍💻 Developer
Developed and Maintained by: isme4
---

## 🚀 Installation & Deployment

Follow these commands to install the tool:

### 1. Clone the Repository
```bash
git clone [https://github.com/isme4/Password-Generator.git](https://github.com/isme4/Password-Generator.git)
cd Password-Generator

chmod +x Generator.php

php Generator.php

