<style>
    .search-button {
        background-color:#ebd9eb
    }
    .search-button:hover {
        background-color:#8c52ff
    }
</style>
<nav class="navbar navbar-expand-lg navbar fixed-top bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
        <img src="resource/img/logo/logo.png" alt="BelaBeli" width="40" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">BelaBeli.com</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2 searchInput" type="search" placeholder="Search" aria-label="Search">
                <button class="btn search-button" type="button">
                    <img src="resource/icons/search.png" alt="Search" width="25" height="25">
                </button>
            </form>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if(!isset($_SESSION['user_id'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="user/registeruser.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user/login.php">Login</a>
                </li>
                <?php else :  ?>
                <!-- setelah login -->
                <!-- add/sell product -->
                <li class="nav-item">
                    <a class="nav-link" href="user/listChat.php">Chat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user/formadd.php">Sell Product</a>
                </li>
                <!-- logout -->
                <li class="nav-item">
                    <a class="nav-link" href="user/api/logout.php">Logout</a>
                </li>
                <?php endif; ?>
 
            </ul>
        </div>
    </div>
</nav>
<script>
    document.querySelector('.search-button').addEventListener('click',function(){
        var theval = document.querySelector('.searchInput').value
        window.location.href = 'searchProduct.php?nama='+theval;
    })
</script>