<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Student Logs Report</title>
    <style>
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            line-height: 1.5;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .info-table th {
            width: 30%;
            text-align: left;
            padding: 8px;
            background-color: #f9f9f9;
        }
        .info-table td {
            width: 70%;
            padding: 8px;
        }
        .logs-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .logs-table th {
            background-color: #f2f2f2;
            padding: 10px;
            text-align: left;
            font-weight: bold;
            border-bottom: 2px solid #ddd;
        }
        .logs-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            vertical-align: top;
        }
        .date-cell {
            width: 15%;
        }
        .description-cell {
            width: 45%;
        }
        .feedback-cell {
            width: 40%;
        }
        .watermark {
            position: fixed;
            bottom: 20px;
            right: 20px;
            opacity: 0.1;
            font-size: 60px;
            transform: rotate(-45deg);
            z-index: -1;
        }
        .page-break {
            page-break-after: always;
        }
        @page {
            margin: 100px 25px;
        }
        .footer {
            position: fixed;
            bottom: -80px;
            left: 0px;
            right: 0px;
            height: 50px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
        .header-top {
            position: fixed;
            top: -80px;
            left: 0px;
            right: 0px;
            height: 50px;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="header-top">
        {{ $companyName }} Internship Log Report
    </div>

    <div class="header">
        <h1>Student Logs Report</h1>
        <p>Period: {{ $startDate->format('F j, Y') }} to {{ $endDate->format('F j, Y') }}</p>
    </div>

    <table class="info-table">
        <tr>
            <th>Student Name</th>
            <td>{{ $studentName }}</td>
        </tr>
        <tr>
            <th>Student ID</th>
            <td>{{ $student->nim }}</td>
        </tr>
        <tr>
            <th>Study Program</th>
            <td>{{ $student->study_program }}</td>
        </tr>
        <tr>
            <th>Company</th>
            <td>{{ $companyName }}</td>
        </tr>
        <tr>
            <th>Position</th>
            <td>{{ $position }}</td>
        </tr>
    </table>

    <h2>Daily Log Entries</h2>

    @if(count($logs) > 0)
        <table class="logs-table">
            <thead>
                <tr>
                    <th class="date-cell">Date</th>
                    <th class="description-cell">Description</th>
                    <th class="feedback-cell">Supervisor Feedback</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                    <tr>
                        <td class="date-cell">{{ $log->log_date->format('M j, Y') }}</td>
                        <td class="description-cell">{!! $log->description !!}</td>
                        <td class="feedback-cell">{{ $log->supervisor_feedback ?? 'No feedback provided' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No log entries found for the selected period.</p>
    @endif

    <div class="footer">
        Generated on {{ now()->format('F j, Y') }} | Page {PAGENO}
    </div>

    <div class="watermark">
        {{ $companyName }}
    </div>
</body>
</html>
