Get-Service | Select-Object Name, Status | ForEach-Object {
    $statusColor = if ($_.Status -eq "Running") { "Green" } else { "Red" }
    Write-Host $_.Name -NoNewline
    Write-Host " [$($_.Status)]" -ForegroundColor $statusColor
}
