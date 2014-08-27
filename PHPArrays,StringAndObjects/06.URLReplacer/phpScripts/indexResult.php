<!DOCTYPE html>

<html>

<head>
    <title>URL Replacer</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../styles/indexResult.css"/>
</head>

<body>
    <?php
    $text = trim($_POST['text']);
    $aTagPattern = '/<[\s]*[a][^>]*(href=(\'|"))[^>]+\2>/';
    $aTagBeginPattern = '/(<)[\s]*[a][^>]href=(\'|")/';
    $aCloseTagPattern = '/<\s*\/\s*a\s*>/';
    if(preg_match($aTagPattern, $text)): ?>
        <div class="header">
            <p>Text after replacement</p>
        </div>
        <div class="result">
            <?php
                $aTags = array();
                preg_match_all($aTagPattern, $text, $aTags);
                $aTags = $aTags[0];
                $urlTags = array();
                foreach($aTags as $tag){
                    $tag = preg_replace($aTagBeginPattern, '[URL=', $tag);
                    $tag = preg_replace('/.$/', ']', $tag);
                    $urlTags[] = $tag;
                }
                $text = str_replace($aTags, $urlTags, $text);
                $text = preg_replace($aCloseTagPattern, '[/URL]', $text);
                echo $text;
            ?>
        </div>
    <?php
    else: ?>
        <div class="result">
            <?php echo 'No '.htmlentities('<a>').' tags found.'; ?>
        </div>
    <?php endif; ?>
</body>

</html>