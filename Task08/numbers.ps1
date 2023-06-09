function Show-Date_Info {
    $currentDate = Get-Date
    $formattedDate = $currentDate.ToString("dd.MM.yyyy")
    Write-Host "Сегодня: $formattedDate"
    $webClient = New-Object System.Net.WebClient
    $dayInfo = $webClient.DownloadString("http://numbersapi.com/$($currentDate.Day)")
    Write-Host $dayInfo
    $monthInfo = $webClient.DownloadString("http://numbersapi.com/$($currentDate.Month)")
    Write-Host $monthInfo
    $yearInfo = $webClient.DownloadString("http://numbersapi.com/$($currentDate.Year)")
    Write-Host $yearInfo
    $webClient.Dispose()
}
Show-Date_Info