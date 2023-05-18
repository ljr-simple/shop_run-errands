<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>校园跑腿</title>
</head>
<style>
  img {
    width: 50px;
    height: 38px;
  }
</style>

<body>
  <div class="payment-form">
    <h2>请选择支付方式</h2>
    <form id="payment-form">
      <label>
        <input type="radio" name="payment-method" value="alipay">
        <img src="./images/payment/alipay-logo.png" alt="支付宝">
      </label>
      <label>
        <input type="radio" name="payment-method" value="wechat">
        <img src="./images/payment/wechat-logo.png" alt="微信支付">
      </label>
      <label>
        <input type="radio" name="payment-method" value="credit-card">
        <img src="./images/payment/credit-card-logo.png" alt="信用卡">
      </label>
      <button type="submit">支付</button>
    </form>
  </div>
  <script>
    const form = document.getElementById('payment-form');
    form.addEventListener('submit', (event) => {
      event.preventDefault();
      var paymentMethod = form.querySelector('input[name="payment-method"]:checked');
      if (paymentMethod) {
        var paymentMethodValue = paymentMethod.value;
        // 进行后续操作
        switch (paymentMethodValue) {
          case 'alipay':
            // 处理支付宝支付
            window.location.replace('http://www.jiaren.com/recharge_html.php');
            break;
          case 'wechat':
            // 处理微信支付
            window.location.replace('http://www.jiaren.com/recharge_html.php');
            break;
          case 'credit-card':
            // 处理信用卡支付
            window.location.replace('http://www.jiaren.com/recharge_html.php');
            break;
          default:
            break;
        }
      } else {
        // 提示用户选择支付方式
        alert('请选择支付方式')
      }
    });

  </script>
</body>

</html>