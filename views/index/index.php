<?php
$currency = $this->escape($this->get('currency'));
?>

<h1><?=$this->getTrans('accountdata') ?></h1>
<?php if ($this->get('checkout_contact') != '') { echo $this->get('checkout_contact') ; } ?>
<br>
<br>
<h1><?=$this->getTrans('bankbalance') ?></h1>
<div>
    <strong>
        <?php if ($this->get('amount') != '') { echo $this->getTrans('balancetotal'),': ', $this->escape($this->getFormattedCurrency($this->get('amount'), $currency)); } 
        else { echo $this->getTrans('balancetotal'), ': ', $this->escape($this->getFormattedCurrency(0, $currency)) ;}
        ?>
    </strong>
    <br>
    <?php if ($this->get('amountplus') != '') { echo $this->getTrans('totalpaid'),': ', $this->escape($this->getFormattedCurrency($this->get('amountplus'), $currency)); } 
    else { echo $this->getTrans('totalpaid'), ': ', $this->escape($this->getFormattedCurrency(0, $currency)) ;}
    ?>
    <br>
    <?php if ($this->get('amountminus') != '') { echo $this->getTrans('totalpaidout'),': ', $this->escape($this->getFormattedCurrency($this->get('amountminus'), $currency)); } 
    else { echo $this->getTrans('totalpaidout'), ': ', $this->escape($this->getFormattedCurrency(0, $currency)) ;}
    ?>
</div>
<br>
<br>
<h1><?=$this->getTrans('bookedpayments') ?></h1>
<ul>
<?php foreach ($this->get('checkout') as $checkout): ?>
    <li>
        <?=$this->escape($checkout->getName()) ?>: 
        <strong>
            <?=$this->escape($this->getFormattedCurrency($checkout->getAmount(), $currency)) ?>
        </strong> 
        <?=$this->getTrans('for') ?>: 
        <?=$this->escape($checkout->getUsage()) ?>
    </li>
    <?php endforeach; ?>
</ul>
