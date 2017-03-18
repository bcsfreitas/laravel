<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lojinha</title>
    <!-- <link rel="stylesheet" href="/css/app.css"> -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <meta charset="utf-8">
    <script type="text/javascript" src="/js/jquery.js"></script>
  </head>
  <body>
    @include('menu')
    <div class="container">
      @if(session('msg'))
      <div class="alert alert-warning">{{session('msg')}}</div>
      @endif

      @yield('conteudo')
    </div>
  </body>
</html>
