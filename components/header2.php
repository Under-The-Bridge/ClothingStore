<header>
    <div id="header-items">
        <a id="header-logo"  href="/"></a>
        <div id="header-div">
            <form id="header-btns">
                <input id="SearchInput" type="text" placeholder="Поиск по каталогу товаров" name="search-value">
                <button id="SearchLogo" class="header-profile-item btn" name="search"></button>
            </form>
            <div id="header-profile-items">
                <div class="header-profile-item" hidden></div>
                <div class="header-profile-item"></div>
                <a class="header-profile-item" href="authorization.php"></a>
                <a class="header-profile-item" href="basket.php">
                    <p class="count"><?php if(isset($query)) echo $query?></p>
                </a>
            </div>
        </div>
    </div>
</header>