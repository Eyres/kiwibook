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
     */
    public function envoyerChat($request, $context)
    {
        $utilsateurManager = new utilisateurTable();
        $chatManager = new chatTable();
        $postManager = new postTable();
        $chat = new chat();
        $post = new post();
        $post->setDate(new \DateTime());
        $post->setTexte($request['message']);
        $chat->setEmetteur($utilsateurManager->getUserByID($context::getSessionAttribute('id')));
        $chat->setPost($post);
        $postManager->create($post);
        $chatManager->create($chat);
        $context->__set('chat', [$chat]);

        return $context->jsonSerialize();
    }
}
