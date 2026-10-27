# 🚀 Desafio: Sistema de Autenticação e Perfil em PHP

Este projeto é um sistema simples e funcional de autenticação de utilizadores e personalização de perfil desenvolvido em PHP. O objetivo principal é praticar a gestão de sessões, autenticação básica e persistência temporária de preferências do utilizador.

---

## 🛠️ Funcionalidades

- 🔑 **Autenticação de Utilizador:** Ecrã de login para validação das credenciais de acesso.
- 🛡️ **Controlo de Acesso com Sessões PHP:** Acesso restrito à página de perfil, visível apenas após autenticação.
- 👤 **Página de Perfil Personalizada:** Exibição da mensagem de boas-vindas com o nome do utilizador autenticado.
- 🎨 **Personalização da Cor de Fundo:** Opção para o utilizador escolher e guardar a cor de fundo desejada na sessão.
- 🚪 **Logout:** Encerramento da sessão com redirecionamento automático para o ecrã de login.

---

## 🔑 Credenciais de Acesso

Para realizar o login no sistema, utiliza os seguintes dados de teste:

- **Utilizador:** `admin`
- **Password:** `123456`

---

## 📁 Estrutura de Ficheiros

```text
.
└── index.php    # Contém a lógica de autenticação, sessão, perfil e personalização de cor.
