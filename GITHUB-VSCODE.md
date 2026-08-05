# Yama Ahmadi Pro — VS Code + GitHub workflow

## 1. Work locally
1. Download the current theme ZIP from WordPress or keep the release ZIP from ChatGPT.
2. Extract it. The project folder is `yama-ahmadi-pro`.
3. Open VS Code → **File → Open Folder** → select `yama-ahmadi-pro`.

## 2. Create a Git repository
Open the VS Code terminal inside the theme folder and run:

```bash
git init
git add .
git commit -m "Initial Yama Ahmadi Pro theme"
git branch -M main
```

Create an empty GitHub repository named `yama-ahmadi-pro`, then connect it:

```bash
git remote add origin https://github.com/YOUR-USERNAME/yama-ahmadi-pro.git
git push -u origin main
```

## 3. Future changes
After editing in VS Code:

```bash
git add .
git commit -m "Describe the change"
git push
```

## 4. Deploy to WordPress
Package only the `yama-ahmadi-pro` folder as ZIP and upload it under **Appearance → Themes** or deploy the folder using FTP/SFTP.

## Recommended rule
Keep GitHub as the master copy. Do not edit production theme files directly in cPanel except for emergencies; pull those emergency changes back into Git afterwards.
