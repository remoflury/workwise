# Workwise
Workwise ist eine Vermittlungsplattform, die Personen mit freien Räumen und Co-Working Space suchende Personen zusammenbringt.

## Coding Standards
Intendation: 4

semantische Tags verwenden

Schreibweisen:
  - JS: camelCase
  - PHP: camelCase
  - HTML: kebab-case
  - Variabeln, Funktionen in Englisch. Deskriptive Namen verwenden, z.B. getUserFromDb() statt user()

## 1. Set up
**Important:** Node.js und php muss installiert sein. Wird mit git gearbeitet, muss dies auch installiert sein.

**1. Installation**

 Öffne in VS Code ein Terminal und führe den Command 
``
npm install 
``
aus. Diese Installation ist einmalig und muss nur beim Projekt Setup gemacht werden.

**2. Connection DB** 

<!-- Fülle die Connection in die sftp.json im Folder .vscode/ aus. Frage dazu beim Administrator nach. -->
Füge im root im ordner backend ein config.php hinzu. Die Connection erhähltst du beim Administrator.

## Development
Steht die Verbindung, sollte bei jedem save automatisch alles auf den Server gepusht werden. Führe den Command 
``
npm run dev
``
aus. Dieser startet die Entwicklung. Dein output kannst du auf localhost:8080 im Browser ansehen. Beenden kannst du die Entwicklung indem du im Terminal Ctrl + C drückst

## 1. Styling

Der Entwicklungscommand kompiliert automatisch alle Tailwind CSS Klassen ins output.css.
**Beachte:** Tailwind funktioniert nach dem Prinzip des mobile first.

## 2. Git

```
git pull
```
Führe den git pull command jedes mal im Terminal aus, wenn du den aktuellen Stand von Github ziehen willst.

Um den aktuellen Stand deiner Arbeit auf Github zu laden führe nacheinander im Terminal folgendes aus:

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
