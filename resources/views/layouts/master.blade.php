<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href=@yield("css") >
    <link rel="stylesheet" href="{{asset("css/app.css")}}" >
    <link
    rel="stylesheet"
    data-purpose="Layout StyleSheet"
    title="Web Awesome"
    href="/css/app-wa-d53d10572a0e0d37cb8d614a3f177a0c.css?vsn=d"
  >

    <link
      rel="stylesheet"
      href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css"
    >

    <link
      rel="stylesheet"
      href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-thin.css"
    >

    <link
      rel="stylesheet"
      href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css"
    >

    <link
      rel="stylesheet"
      href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-regular.css"
    >

    <link
      rel="stylesheet"
      href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-light.css"
    >
</head>
<body>
   @yield("section") 
</body>
</html>