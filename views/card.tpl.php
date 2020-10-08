<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Payment card checkout</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  
      <link rel="stylesheet" href="/assets/css/style.css">

</head>

<body>
  <div class="tips">
Payment card number: (4) VISA, (51 -> 55) MasterCard, (36-38-39) DinersClub, (34-37) American Express, (65) Discover, (5019) dankort
</div>

<div class="container">
  <div class="sInfo">
    <label for="amount">Сумма платежа:</label>
    <div class="amount"><?=$_SESSION['payData']['amount']; ?> &#8381</div>
    <hr>
    <label for="amount">Назначение платежа:</label>
    <div class="paymentPurpose"><?=$_SESSION['payData']['paymentPurpose']; ?></div>
  </div>

  <div class="col1">
    <div class="card">
      <div class="front">
        <div class="type">
          <img class="bankid"/>
        </div>
        <span class="chip"></span>
        <span class="card_number">&#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF; </span>
        <div class="date"><span class="date_value">MM / YYYY</span></div>
        <span class="fullname">FULL NAME</span>
      </div>
      <div class="back">
        <div class="magnetic"></div>
        <div class="bar"></div>
        <span class="seccode">&#x25CF;&#x25CF;&#x25CF;</span>
        <span class="chip"></span><span class="disclaimer">This card is property of Random Bank of Random corporation. <br> If found please return to Random Bank of Random corporation - 21968 Paris, Verdi Street, 34 </span>
      </div>
    </div>
  </div>
  <form class="col2" action="<?=PAYMENTS_URL?>cards/form/check" method="POST">
    <label>Номер карты</label>
    <input class="number" name="cardNumber" type="text" ng-model="ncard" maxlength="19" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required/>
    <label>Имя и фамилия (как на карте)</label>
    <input class="inputname" type="text" name="name" placeholder="" required/>
    <label>Срок действия карты</label>
    <input class="expire" type="text" placeholder="MM / YYYY" required/>
    <label>CVC код</label>
    <input class="ccv" type="text" placeholder="CVC" maxlength="3" onkeypress='return event.charCode >= 48 && event.charCode <= 57'required/>
    <button class="buy" type="submit"><i class="material-icons">lock</i>Оплатить <?=$_SESSION['payData']['amount']; ?> &#8381</button>
  </form>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>

<script src="/assets/js/index.js"></script>

</body>
</html>
