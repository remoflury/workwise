# Workwise
**Important:** Node.js muss installiert sein

## 1. Set up

**1. Installation**

 Öffne in VS Code ein Terminal und führe den Command 
 
``
npm install aus
``

**2. Connectino DB** 

Fülle die Connection in die sftp.json im Folder .vscode/ aus. Frage dazu beim Administrator nach.

## Development
Steht die Verbindung, sollte bei jedem save automatisch alles auf den Server gepusht werden.

## 1. Styling

Möchtest du stylen, führe im Terminal den Command

``
npm run dev
``

aus. Dieser kompiliert automatisch alle Tailwind CSS Klassen ins output.css.

## 2. Git
Nach jeder Änderung eines Tasks, führe nach einander im Terminal folgendes aus:


  **2.1 Git add**

  ``
  git add .
  ``

  Mit diesem Befehl werden geänderte Files getrackt.


  **2.2 Git commit**

  ``
  git commit -m "testmessage"
  ``

  Mit diesem Befehl wird ein "snapshot" aller getrackten Changes erstellt, damit die Changes später rückverfolgt werden können. Füge in den Anführungszeichen eine deskriptive Beschreibung deines Commits hinzu. z.B. "styling primary Button"

  **2.3 git push**

  ``
  git push
  ``

  Mit diesem Befehl lädst du alle deine Commits auf github.