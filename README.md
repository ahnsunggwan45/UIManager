# UIManager
 Easy to create forms for PocketMine-MP

---
## HOW TO USE

Simple Form

    $form = new SimpleForm('title', 'content');
    $form->addButton(new Buttom('your text'));


Custom Form

    $form = new CustomForm('title');
    $form->addElement(new Label('your text'));

send to player
    
    $player->sendForm($form);
    