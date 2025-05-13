<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ env('App_Name') }} - {{Request()->Route()->getName()}}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset/images/favicon.png')}}">
    <!-- Pignose Calender -->
    <link href="{{ asset('asset/plugins/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('asset/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>