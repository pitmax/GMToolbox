<?php
$this->getParentBlock($data);
?>
                <!-- lieux -->
                <li>
                    <a href="<?php echo __WWW__; ?>" class="nav-top-item <?php echo ((isset($data['active']) && $data['active'] == "gmtoolbox_lieux")) ? 'current' : ''; ?>">Lieux</a>
                    <ul>
                        <li><a href="<?php echo __WWW__; ?>/lieux" <?php echo (isset($data['current']) && $data['current'] == "gmtoolbox_lieux") ? 'class="current"' : ''; ?>>Gérer les lieux</a></li>
                    </ul>
                </li>
