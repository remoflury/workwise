# Workwise
**Important:** Node.js und php muss installiert sein

## Coding Standards
Intendation: 4
semantische Tags verwenden
Schreibweisen:
  - JS: camelCase
  - PHP: camelCase
  - HTML: kebab-case
  - Variabeln, Funktionen in Englisch

## 1. Set up

**1. Installation**

 Öffne in VS Code ein Terminal und führe den Command 
``
npm install 
``
aus

**2. Connection DB** 

<!-- Fülle die Connection in die sftp.json im Folder .vscode/ aus. Frage dazu beim Administrator nach. -->
Füge im root im ordner backend ein config.php hinzu. Die Connection erhähltst du beim Administrator.

## Development
Steht die Verbindung, sollte bei jedem save automatisch alles auf den Server gepusht werden. Führe den Command 
``
npm run dev
``
aus. Dieser startet die Entwicklung. Dein output kannst du auf localhost:8080 im Browser ansehen.

## 1. Styling

Der Entwicklungscommand kompiliert automatisch alle Tailwind CSS Klassen ins output.css.
**Beachte:** Tailwind funktioniert nach dem Prinzip des mobile first

<!-- Es kommt vor, dass das automatisch geänderte output.css nicht automatisch hocheladen wird. Falls dies auftritt mit cmd + shift + p nach "SFTP: Sync Local -> Remote" suchen und ausführen.  -->


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