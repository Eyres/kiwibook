<?php


/**
 * Class AjaxController
 */
class AjaxController
{
    /**
     * @param $request
     * @param context $context
     * @return mixed
     * @author Estelle Corsetti
     */
    public function logout($request, $context)
    {
        session_destroy();
        $context->notification = 'Vous êtes bien déconnecté';

        return $context->jsonSerialize();
    }

    /**
     * @param $request
     * @param context $context
     * @return mixed
     * @author Simon Vivier
     */
    public function loadMessage($request, $context)
    {
        $messageTable = new messageTable();
        $context->__set('messages', $messageTable->getMessages(10, $request['offset']));

        return $context->jsonSerialize();
    }

    /**
     * @param $request
     * @param context $context
     * @return mixed
     * @author Simon Vivier
     */
    public function loadAmis($request, $context)
    {
        $amisTable = new utilisateurTable();
        $context->__set('amis', $amisTable->getUsers(10, $request['offset']));

        return $context->jsonSerialize();
    }

    /**
     * @param $request
     * @param context $context
     * @return mixed
     *
     * @author Estelle Corsetti
     */
    public function loadChat($request, $context)
    {
        $chatTable = new chatTable();
        $context->__set('chat', $chatTable->getLastChats(15));

        return $context->jsonSerialize();
    }

    /**
     * @param $request
     * @param context $context
     * @return mixed
     * @author Estelle Corsetti
     */
    public function envoyerChat($request, $context)
    {
        $userTable = new utilisateurTable();
        $chatTable = new chatTable();
        $postTable = new postTable();
        $chat = new chat();
        $post = new post();
        $post->setDate(new \DateTime());
        $post->setTexte($request['message']);
        $chat->setEmetteur($userTable->getUserByID($context::getSessionAttribute('id')));
        $chat->setPost($post);
        $postTable->create($post);
        $chatTable->create($chat);
        $context->__set('chat', [$chat]);

        return $context->jsonSerialize();
    }

    /**
     * @param $request
     * @param context $context
     * @return mixed
     * @author Simon Vivier
     */
    public function envoyerPost($request, $context)
    {
        $userTable = new utilisateurTable();
        $messageTable = new messageTable();
        $postTable = new postTable();
        $message = new message();
        $post = new post();
        $post->setDate(new \DateTime());
        $post->setTexte($request['message']);
        $message->setEmetteur($userTable->getUserByID($context::getSessionAttribute('id')));
        if (!empty($request['destinataire'])) {
            $message->setDestinataire($userTable->getUserByID((int)$request['destinataire']));
        }
        $message->setParent($userTable->getUserByID($context::getSessionAttribute('id')));
        $message->setAime(0);
        $message->setPost($post);
        $postTable->create($post);
        $messageTable->create($message);

        $context->__set('message', [$message]);


        return $context->jsonSerialize();
    }
}
