$desktopPath = [Environment]::GetFolderPath("Desktop")
$badLinksPath = Join-Path $desktopPath "BadLinks"
if (-not (Test-Path $badLinksPath -PathType Container)) {
    New-Item -Path $badLinksPath -ItemType Directory | Out-Null
}
$shell = New-Object -ComObject WScript.Shell
$shortcuts = Get-ChildItem -Path $desktopPath | Where-Object { $_.Extension -eq ".lnk" }
foreach ($shortcut in $shortcuts) {
    $shortcutPath = $shortcut.FullName
    $shortcutName = $shortcut.Name
    $shortcutLink = $shell.CreateShortcut($shortcutPath)
    $targetPath = $shortcutLink.TargetPath
    if (-not ([string]::IsNullOrEmpty($targetPath)) -and -not (Test-Path $targetPath)) {
        $newPath = Join-Path $badLinksPath $shortcutName
        Move-Item $shortcutPath -Destination $newPath
        Write-Host "Ярлык '$shortcutName' перемещен в каталог 'BadLinks'."
    }
}
