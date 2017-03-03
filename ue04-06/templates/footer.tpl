<footer class="Site-footer">
    <div class="Footer Footer--small">
        <p class="Footer-credits">Created and maintained by
            <a href="mailto:martin.harrer@fh-hagenberg.at">Martin Harrer</a> and
            <a href="mailto:wolfgang.hochleitner@fh-hagenberg.at">Wolfgang Hochleitner</a>.
        </p>
        <p class="Footer-version">{$smarty.const.ICON}
            <a href="https://github.com/Digital-Media/phpue">{$smarty.const.TITLE} Version 2017</a>
        </p>
    </div>
</footer>
{if isset($lightbox) && $lightbox === true}
<script src="../vendor/jsOnlyLightbox/js/lightbox.min.js"></script>
<script>
    var lightbox = new Lightbox();
    lightbox.load();
</script>
{/if}
</body>
</html>