<!DOCTYPE html>

<html>

<head>
    <title>HTML Tag Counter</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="HTMLTagsCounter.css"/>
</head>

<body>
    <?php
    session_start();
    ?>
    <form action="HTMLTagsCounter.php" method="post" class="form">
        <div>
            <label>
                Enter HTML Tags
            </label>
        </div>
        <div>
            <input type="text" name="tag"/>
        </div>
        <input type="submit" value="Submit"/>
        <button class="reset" type="button" onclick="window.location.href='resetTheTagsCounter.php'">
            Reset
        </button>
        <input type="hidden" name="submitted"/>
    </form>
    <div class="result">
        <?php
        if(isset($_POST['submitted'])){
            if(!isset($_SESSION['gameStarted'])){
                $_SESSION['gameStarted'] = true;
                $_SESSION['score'] = 0;
                $_SESSION['tags'] = array(
                    'a' => array('isSubmitted' => false),
                    'abbr' => array('isSubmitted' => false),
                    'address' => array('isSubmitted' => false),
                    'area' => array('isSubmitted' => false),
                    'article' => array('isSubmitted' => false),
                    'aside' => array('isSubmitted' => false),
                    'audio' => array('isSubmitted' => false),
                    'b' => array('isSubmitted' => false),
                    'base' => array('isSubmitted' => false),
                    'bdi' => array('isSubmitted' => false),
                    'bdo' => array('isSubmitted' => false),
                    'blockquote' => array('isSubmitted' => false),
                    'body' => array('isSubmitted' => false),
                    'br' => array('isSubmitted' => false),
                    'button'    => array('isSubmitted' => false),
                    'canvas' => array('isSubmitted' => false),
                    'caption' => array('isSubmitted' => false),
                    'cite' => array('isSubmitted' => false),
                    'code' => array('isSubmitted' => false),
                    'col' => array('isSubmitted' => false),
                    'colgroup' => array('isSubmitted' => false),
                    'command' => array('isSubmitted' => false),
                    'datalist' => array('isSubmitted' => false),
                    'dd' => array('isSubmitted' => false),
                    'del' => array('isSubmitted' => false),
                    'details' => array('isSubmitted' => false),
                    'dfn' => array('isSubmitted' => false),
                    'div' => array('isSubmitted' => false),
                    'dl' => array('isSubmitted' => false),
                    'dt' => array('isSubmitted' => false),
                    'em' => array('isSubmitted' => false),
                    'embed' => array('isSubmitted' => false),
                    'fieldset' => array('isSubmitted' => false),
                    'figcaption' => array('isSubmitted' => false),
                    'figure' => array('isSubmitted' => false),
                    'footer' => array('isSubmitted' => false),
                    'form' => array('isSubmitted' => false),
                    'h1' => array('isSubmitted' => false),
                    'h2' => array('isSubmitted' => false),
                    'h3' => array('isSubmitted' => false),
                    'h4' => array('isSubmitted' => false),
                    'h5' => array('isSubmitted' => false),
                    'h6' => array('isSubmitted' => false),
                    'head' => array('isSubmitted' => false),
                    'header' => array('isSubmitted' => false),
                    'hgroup' => array('isSubmitted' => false),
                    'hr' => array('isSubmitted' => false),
                    'html' => array('isSubmitted' => false),
                    'i' => array('isSubmitted' => false),
                    'iframe' => array('isSubmitted' => false),
                    'img' => array('isSubmitted' => false),
                    'input' => array('isSubmitted' => false),
                    'ins' => array('isSubmitted' => false),
                    'kbd' => array('isSubmitted' => false),
                    'keygen' => array('isSubmitted' => false),
                    'label' => array('isSubmitted' => false),
                    'legend' => array('isSubmitted' => false),
                    'li' => array('isSubmitted' => false),
                    'link' => array('isSubmitted' => false),
                    'map' => array('isSubmitted' => false),
                    'mark' => array('isSubmitted' => false),
                    'menu' => array('isSubmitted' => false),
                    'meta' => array('isSubmitted' => false),
                    'meter' => array('isSubmitted' => false),
                    'nav' => array('isSubmitted' => false),
                    'noscript' => array('isSubmitted' => false),
                    'object' => array('isSubmitted' => false),
                    'ol' => array('isSubmitted' => false),
                    'optgroup' => array('isSubmitted' => false),
                    'option' => array('isSubmitted' => false),
                    'output' => array('isSubmitted' => false),
                    'p' => array('isSubmitted' => false),
                    'param' => array('isSubmitted' => false),
                    'pre' => array('isSubmitted' => false),
                    'progress' => array('isSubmitted' => false),
                    'q' => array('isSubmitted' => false),
                    'rp' => array('isSubmitted' => false),
                    'rt' => array('isSubmitted' => false),
                    'ruby' => array('isSubmitted' => false),
                    's' => array('isSubmitted' => false),
                    'samp' => array('isSubmitted' => false),
                    'script' => array('isSubmitted' => false),
                    'section' => array('isSubmitted' => false),
                    'select' => array('isSubmitted' => false),
                    'small' => array('isSubmitted' => false),
                    'source' => array('isSubmitted' => false),
                    'span' => array('isSubmitted' => false),
                    'strong' => array('isSubmitted' => false),
                    'style' => array('isSubmitted' => false),
                    'sub' => array('isSubmitted' => false),
                    'summary' => array('isSubmitted' => false),
                    'sup' => array('isSubmitted' => false),
                    'table' => array('isSubmitted' => false),
                    'tbody' => array('isSubmitted' => false),
                    'td' => array('isSubmitted' => false),
                    'textarea' => array('isSubmitted' => false),
                    'tfoot' => array('isSubmitted' => false),
                    'th' => array('isSubmitted' => false),
                    'thead' => array('isSubmitted' => false),
                    'time' => array('isSubmitted' => false),
                    'title' => array('isSubmitted' => false),
                    'tr' => array('isSubmitted' => false),
                    'track' => array('isSubmitted' => false),
                    'u' => array('isSubmitted' => false),
                    'ul' => array('isSubmitted' => false),
                    'var' => array('isSubmitted' => false),
                    'video' => array('isSubmitted' => false),
                    'wbr' => array('isSubmitted' => false)
                );
            }

            $currentTagSubmitted = $_POST['tag'];
            $tags = &$_SESSION['tags'];
            if(isset($tags[$currentTagSubmitted])){
                echo '<div>Valid HTML tag</div>';
                if($tags[$currentTagSubmitted]['isSubmitted'] === false){
                    $_SESSION['score'] += 1;
                } else {
                    echo '<div>Already submitted tag</div>';
                }
                $score = $_SESSION['score'];
                echo "<div>Score: $score</div>";
                $tags[$currentTagSubmitted]['isSubmitted'] = true;
            } else {
                echo '<div>Invalid HTML tag</div>';
            }
        }
        ?>
    </div>
</body>

</html>