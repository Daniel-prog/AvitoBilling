<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ошибка!</title>
<style>
    * {
      box-sizing: border-box;
    }
    body {
      font: 110%/1.5 system-ui, sans-serif;
      color: black;
      height: 100vh;
      margin: 0;
      display: grid;
      place-items: center;
      padding: 2rem;
    }
    main {
      display: grid;
      place-items: center;
      max-width: 350px;
      text-align: center;
    }

  </style>
</head>
<body>
	<main>
		<img src="/assets/img/error.png" alt="Error" height="250px" width="250px">
		<h1><?=$errorText; ?></h1>
    <?php if($button) { ?>
    <input type="button" onclick="history.back();" value="Назад"/>
  <?php } ?>
	</main>
</body>
</html>