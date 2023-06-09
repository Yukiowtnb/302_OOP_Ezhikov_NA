if (-not (Get-Command -Name New-Object -ErrorAction SilentlyContinue)) {
    Write-Host "Необходимо установить модуль Excel"
    return
}
$excel = New-Object -ComObject Excel.Application
$workbook = $excel.Workbooks.Add()
$sheet = $workbook.ActiveSheet
$cellB2 = $sheet.Range("B2")
$cellB2.Value2 = "Привет от PowerShell"
$cellB2.Font.Size = 12
$cellB2.Font.Italic = $true
$currentUserName = $env:USERNAME
$computerName = $env:COMPUTERNAME
$fileName = "${currentUserName}_${computerName}.xlsx"
$savePath = Join-Path $env:USERPROFILE $fileName
$workbook.SaveAs($savePath)
$workbook.Close()
$excel.Quit()
[System.Runtime.Interopservices.Marshal]::ReleaseComObject($sheet) | Out-Null
[System.Runtime.Interopservices.Marshal]::ReleaseComObject($workbook) | Out-Null
[System.Runtime.Interopservices.Marshal]::ReleaseComObject($excel) | Out-Null
[System.GC]::Collect()
[System.GC]::WaitForPendingFinalizers()
Write-Host "Файл '$fileName' успешно создан и сохранен."