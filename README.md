# Electricity_Board_mngt
Electricity Board Management System (DBMS)
<h1 align="center">
  ⚡️ Electricity Board Management System<br>
  <sub><em>Modern DBMS project for managing consumers, bills & payments</em></sub>
</h1>

<p align="center">
  <a href="https://github.com/Shank-devBytes001/Electricity_board_mngt">
    <img src="https://img.shields.io/github/last-commit/Shank-devBytes001/Electricity_board_mngt?logo=github&style=for-the-badge" alt="last commit">
  </a>
  <a href="https://github.com/Shank-devBytes001/Electricity_board_mngt/issues">
    <img src="https://img.shields.io/github/issues/Shank-devBytes001/Electricity_board_mngt?style=for-the-badge" alt="open issues">
  </a>
  <img src="https://img.shields.io/github/languages/top/Shank-devBytes001/Electricity_board_mngt?style=for-the-badge" alt="top language">
  <img src="https://img.shields.io/badge/PRs-welcome-brightgreen?style=for-the-badge&logo=git" alt="PRs welcome">
</p>

---

## ✨ Features

- CRUD operations for **customers, meters, tariffs & bills**
- Admin dashboard with real-time consumption statistics
- Secure **login/session management**
- Auto-calculated late-payment surcharge
- Responsive design (pure PHP + CSS, no heavy frameworks)
- MySQL-ready schema & seed script

---

## 🛠️ Tech Stack

<table>
  <tr>
    <td align="center"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" width="60" alt="PHP"><br>PHP 8</td>
    <td align="center"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" width="60" alt="MySQL"><br>MySQL 8</td>
    <td align="center"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" width="60" alt="HTML5"><br>HTML5</td>
    <td align="center"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" width="60" alt="CSS3"><br>CSS3</td>
  </tr>
</table>

---

## ⚙️ Getting Started

### Prerequisites

| Tool     | Version |
|----------|---------|
| PHP      | ≥ 8.1   |
| MySQL    | ≥ 8.0   |
| Composer | *(optional)* latest |

### Local Setup

```bash
# 1. Clone the repository
git clone https://github.com/Shank-devBytes001/Electricity_board_mngt.git
cd Electricity_board_mngt

# 2. Copy & edit the DB connection
cp connection.example.php connection.php
# → update DB_HOST, DB_USER, DB_PASS, DB_NAME

# 3. Import the database schema
mysql -u <your_user> -p < db/schema.sql

# 4. Serve with PHP
php -S localhost:8000

```
---
### Database Details

```bash
erDiagram
    CUSTOMER ||--o{ BILL : generates
    CUSTOMER {
        int customer_id PK
        varchar name
        varchar address
        varchar contact
    }
    BILL {
        int bill_id PK
        int customer_id FK
        int units
        decimal amount
        date due_date
        boolean paid
    }
```
---
