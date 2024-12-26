<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Courrier;
use App\Notifications\newCommentPosted;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends Controller
{
    public function store(Courrier $courrier)
    {
        request()->validate(
            [
                'commentaire'   =>  'required|min:5',
            ]
        );

        $comment = new Comment();
        $comment->content  = request('commentaire');
        $comment->users_id = auth()->user()->id;
        $comment->courriers_id = $courrier->id;

        $courrier->comments()->save($comment);

        $courrier->user->notify(new newCommentPosted($courrier, auth()->user()));

        $type_courrier = $courrier->type;

        if ($type_courrier == 'depart') {
            foreach ($courrier->departs as $key => $depart) {
                $id = $depart->id;
            }
        } elseif ($type_courrier == 'arrive') {
            foreach ($courrier->arrives as $key => $arrive) {
                $id = $arrive->id;
            }
        }

        /* $success = 'Commentaire posté !'; */
        /* return redirect()->route($type_courrier . 's.show', $id)->with('status', $success); */

        Alert::success('Bravo !', 'votre commentaire à été ajouté !');
        return redirect()->route($type_courrier . 's.show', $id);
    }

    public function storeCommentReply(Comment $comment)
    {
        request()->validate(
            [
                'replayComment'   =>  'required|min:5',
            ]
        );

        $commentReply = new Comment();
        $commentReply->content = request('replayComment');
        $commentReply->users_id = auth()->user()->id;
        $commentReply->courriers_id = $comment->courrier->id;

        $comment->comments()->save($commentReply);


        //Notifications Réponse 
        /* $success = 'réponse posté !'; */
        Alert::success('Bravo !', 'votre réponse au commentaire à été ajouté !');

        $comment->user->notify(new newCommentPosted($comment->courrier, auth()->user()));
       
        $courrier = $comment->courrier;
        $type_courrier = $courrier->type;

        if ($type_courrier == 'depart') {
            foreach ($courrier->departs as $key => $depart) {
                $id = $depart->id;
            }
        } elseif ($type_courrier == 'arrive') {
            foreach ($courrier->arrives as $key => $arrive) {
                $id = $arrive->id;
            }
        }

        return redirect()->route($type_courrier . 's.show', $id);

    }
}
