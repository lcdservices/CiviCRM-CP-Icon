<?php
/**
 * @version     $Id: mod_civicrmcpicon.php $
 * @package     CiviCRM Add-on
 * @copyright   Copyright (C) Lighthouse Consulting & Design. All rights reserved. www.lcdservices.biz
 * @license     GNU/GPL
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

if (!defined( '_JOS_CIVICRMCPICON_MODULE' ))
{
    /** ensure that functions are declared only once */
    define( '_JOS_CIVICRMCPICON_MODULE', 1 );

    function quickiconButtonCiviCRM( $link, $image, $text )
    {
        global $mainframe;
        $lang =& JFactory::getLanguage();
        ?>
        <div style="float:<?php echo ($lang->isRTL()) ? 'right' : 'left'; ?>;">
            <div class="icon">
                <a href="<?php echo $link; ?>">
                    <?php echo JHTML::_('image.site',  $image, '/modules/mod_civicrmcpicon/', NULL, NULL, $text ); ?>
                    <span><?php echo $text; ?></span></a>
            </div>
        </div>
        <?php
    }

    ?>
    <div class="icon-wrapper" id="civicrmicon">
        <?php
			$link = 'index.php?option=com_civicrm&task=civicrm/dashboard&reset=1';
			quickiconButtonCiviCRM( $link, 'icon-48-civicrm.png', JText::_( 'CiviCRM Home' ) );
        ?>
    </div>
    <!--Borrowed this method of injecting into the quick icons panel from Akeeba Backup (www.akeebabackup.com)-->
    <script lang="text/javascript">
	var civicrmIcon = $('civicrmicon');
	try {
		var civicrmIconParent = $('civicrmicon').getParent().getParent();
		if(civicrmIconParent.attributes.class.textContent == 'panel') {
			civicrmIconParent.setStyle('display','none');
		}
		$('cpanel').grab(civicrmIcon);
	} catch(e) {	
	}
        <?php if(version_compare(JVERSION, '2.5.0', 'lt')): ?>
	try {
	    $('cpanel').grab(civicrmIcon);
	} catch(e) {
	}
	<?php else: ?>
	try {
	    $$('div.cpanel')[0].grab(civicrmIcon,'top');
	} catch(e) {
	}
	<?php endif; ?>
    </script>
    <?php
}

