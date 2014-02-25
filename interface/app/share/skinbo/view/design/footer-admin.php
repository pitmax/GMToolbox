<?php
if (!$request->AJAX) {
?>
            </div>
            <div class="spacer"></div>
        </div>
<!-- injection des scripts dans le footer -->
<?php
    // charge le footer (dans lequel on a notamment injecte les scripts precedents)
    $this->getBlock('cssjs/foot');
?>
    </body>
</html>
<?php
}
?>
