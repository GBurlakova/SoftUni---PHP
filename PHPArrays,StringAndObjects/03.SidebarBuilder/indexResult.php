<!DOCTYPE html>

<html>

<head>
    <title>Sidebar Builder</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="styles/resultPage.css"/>
</head>

<body>
    <header>
        <h1>Some Header</h1>
    </header>
    <aside>
        <section>
        <h1>Categories</h1>
        <ul>
            <?php
            $categoriesStr = $_POST['categories'];
            $categoriesPattern = '/(([A-Z][a-z]+, )+[A-Z][a-z]+)|[A-Z][a-z]+/';
            if(!empty($categoriesStr)):
                if(preg_match($categoriesPattern, $categoriesStr) == 1):
                    $categories = preg_split('/, /', $categoriesStr);
                    sort($categories);
                    foreach($categories as $category): ?>
                        <li><a href="#"><?php echo $category; ?></a></li>
                    <?php
                    endforeach;
                else: header('Location: indexErrorMessage.php');
                      return;
                endif;
            else: header('Location: indexErrorMessage.php');
                  return;
            endif; ?>
        </section>
        <section>
            <h1>Tags</h1>
            <ul>
            <?php
            $tagsStr = $_POST['tags'];
            $tagsPattern = '/(([a-z]+, )+[a-z]+)|[a-z]+/';
            if(!empty($tagsStr)):
                if(preg_match($tagsPattern, $tagsStr) == 1):
                    $tags = preg_split('/, /', $tagsStr);
                    sort($tags);
                    foreach($tags as $tag): ?>
                        <li><a href="#"><?php echo $tag; ?></a></li>
                    <?php
                    endforeach;
                else: header('Location: indexErrorMessage.php');
                    return;
                endif;
            else: header('Location: indexErrorMessage.php');
                return;
            endif; ?>
            </ul>
        </section>
        <section>
            <h1>Months</h1>
            <ul>
                <?php

                function sortMonths($month1, $month2){
                    $allMonths = array('January', 'February', 'March', 'April', 'April', 'May', 'June',
                                'July', 'August', 'September', 'October', 'November', 'December');
                    if(array_search($month1, $allMonths) == array_search($month2, $allMonths)){
                        return 0 ;
                    }
                    return (array_search($month1, $allMonths) < array_search($month2, $allMonths)) ? -1 : 1;
                }

                $monthsStr = $_POST['months'];
                $monthsPattern = '/(([A-Z][a-z]+, )+[A-Z][a-z]+)|[A-Z][a-z]+/';
                $allowedMonths = array('January', 'February', 'March', 'April', 'April', 'May', 'June',
                                       'July', 'August', 'September', 'October', 'November', 'December');
                if(!empty($monthsStr)){
                    if(preg_match($monthsPattern, $monthsStr) == 1){
                        $months = preg_split('/, /', $monthsStr);
                        usort($months, 'sortMonths');
                        foreach($months as $month):
                            if(array_search($month, $allowedMonths) !== false): ?>
                                <li><a href="#"><?php echo $month; ?></a></li>
                            <?php else: header('Location: indexErrorMessage.php');
                                        return;
                            endif;
                        endforeach;
                    }
                } else{
                    header('Location: indexErrorMessage.php');
                    return;
                }?>
            </ul>
        </section>
    </aside>
    <main>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dapibus diam quis sodales tempus. Pellentesque suscipit sem eu nibh molestie sodales. Vivamus fringilla vel arcu id porttitor. Quisque tortor lacus, malesuada sit amet dui eget, tincidunt ultrices enim. Ut dignissim ultrices sodales. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc sed dignissim tortor, nec volutpat neque.
        </p>
        <p>
            Praesent non metus dapibus, convallis augue nec, mollis urna. Sed dictum risus leo, eget aliquam magna volutpat et. Pellentesque blandit semper est sed imperdiet. Curabitur facilisis, justo vitae hendrerit vulputate, tortor leo egestas augue, a ultricies mi lectus in dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla bibendum risus tellus, id consequat mi pellentesque nec. Nunc ac arcu a nibh pretium pharetra at sit amet ante. Aliquam tempor viverra volutpat. Vivamus rhoncus dignissim lacus.
        </p>
        <p>
        <p>
            Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc non arcu placerat, facilisis sem a, mollis magna. Etiam fringilla dapibus turpis id dignissim. Donec congue arcu nisl. Sed odio augue, varius vel fermentum quis, sagittis facilisis ipsum. Vivamus pellentesque ligula urna. Fusce condimentum fermentum elit a tincidunt. Etiam condimentum scelerisque tellus ac malesuada.
        </p>
    </main>
    <footer>
        <p>Some Footer Text</p>
    </footer>
</body>

</html>