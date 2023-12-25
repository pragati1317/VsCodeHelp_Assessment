<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"rel="nofollow" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="App.css">
</head>
<body>
   
      <!-- DashBoard page -->
      <div class="user-area">
        <div class="container">
          <div class="row">  
           <h3>
            <?php session_start();
            echo $_SESSION['username'] ; ?>  
           </h3>
         
          <h5>Member since December,2023</h5>
          </div>
          <div class="row mt-4">
            <div class="col-lg-12">
              <ul class="nav nav-tabs user-nav tabs">
                <li class="nav-item">
                  <a  class="nav-link text-secondary" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a  class="nav-link text-secondary" href="#">Deposit</a>
                </li>
                <li class="nav-item">
                  <a  class="nav-link text-secondary" href="#">Withdraw</a>
                </li>
                <li class="nav-item">
                  <a  class="nav-link text-secondary" href="#">My Projects</a>
                </li>
                <li class="nav-item">
                  <a  class="nav-link text-secondary" href="#">Hidden Projects</a>
                </li>
                <li class="nav-item">
                  <a  class="nav-link text-secondary" href="#">Sell History</a>
                </li>
                <li class="nav-item">
                  <a  class="nav-link text-secondary" href="#">Purchased History</a>
                </li>
                <li class="nav-item">
                  <a  class="nav-link text-secondary" href="#">Transactions</a>
                </li>
                <li class="nav-item">
                  <a  class="nav-link text-secondary" href="#">Support</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        
</body>
</html>