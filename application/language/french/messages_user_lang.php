<?php
/**
 * Message file for entity User
 * 
 * Please don't forget to load this file:
 *  Solution A : Use "/application/config/autoload.php"
 *               Add this line:
 *               $autoload['language'] = array(..., 'messages_user', ...);
 *
 *  Solution B : Load this message file anywhere you want.
 *  
 */
$lang['user.message.askConfirm.deletion'] = "Désirez-vous supprimer ce Utilisateur ?";

$lang['user.message.confirm.deleted'] = "Utilisateur supprimé";
$lang['user.message.confirm.added'] = "Utilisateur créé avec succès";
$lang['user.message.confirm.modified'] = "Utilisateur mis à jour avec succès";

$lang['user.message.error.password_non_equal'] = "Les mots de passe ne sont pas identiques";

$lang['user.form.create.title'] = "Ajouter un utilisateur";
$lang['user.form.edit.title'] = "Editer un utilisateur";
$lang['user.form.list.title'] = "Liste des utilisateurs";

$lang['user.menu.item'] = "Utilisateur";


$lang['user.form.usridusr.label'] = "identifiant";
$lang['user.form.usridusr.description'] = "identifiant interne";
$lang['user.form.usrlbnom.label'] = "Nom";
$lang['user.form.usrlbnom.description'] = "Nom de l'utilisateur";
$lang['user.form.usrlblgn.label'] = "Login";
$lang['user.form.usrlblgn.description'] = "Identifiant de connexion";
$lang['user.form.usrlbpwd.label'] = "Mot de passe";
$lang['user.form.usrlbpwd.description'] = "Mot de passe de connexion";
$lang['user.form.usrlbmai.label'] = "Email";
$lang['user.form.usrlbmai.description'] = "Adresse e-mail de contact";
$lang['user.form.usrfipho.label'] = "Photo";
$lang['user.form.usrfipho.description'] = "Image, photo ou avatar";



$lang['user.form.editprofile'] = "Editer mon profil";
$lang['user.form.editprofile.title'] = "Editer mon profil";

$lang['user.form.invite.title'] = "Inviter un ami";
$lang['user.form.invite.send'] = "Envoyer l'invitation";
$lang['user.message.confirm.invited'] = "Invitation envoyée par mail";

$lang['user.message.user_not_found'] = "L'utilisateur %1 n'a pas été trouvé.";
$lang['user.message.invalid_token'] = "Votre jeton est invalide.";

$lang['user.message.already_registered'] = "Vous êtes déjà enregistré.";



/* forgotPassword */
$lang['forgotPassword.message.title'] = "Mot de passe oublié";
$lang['forgotPassword.form.email'] = "Saisissez votre email";
$lang['forgotPassword.form.send'] = "Envoyer";

$lang['forgotPassword.form.notfound'] = "L'adresse email est inconnue.";
$lang['forgotPassword.form.mail_sent'] = "Un message a été envoyé à l'adresse email.";
$lang['forgotPassword.form.mail_error'] = "Erreur lors de l'envoi du message.";
$lang['forgotPassword.form.mail_multiple'] = "Plusieurs utilisateurs avec le même mail...";
$lang['forgotPassword.form.cancel'] = "Annuler";


/* signin */
$lang['signin.message.title'] = "Créer un compte";
$lang['signin.form.email'] = "Saisissez votre email";
$lang['signin.form.step2'] = "Etape 2";
$lang['signin.form.send'] = "Envoyer";

$lang['signin.form.mail_already_taken'] = "Cet email est déjà utilisé. Veuillez en choisir un autre.";
$lang['signin.form.login_already_taken'] = "Ce login de connexion est déjà utilisé. Veuillez en choisir un autre.";

$lang['signin.form.usrlblgn.label'] = "Login";
$lang['signin.form.usrlbpwd.label'] = "Mot de passe";
$lang['signin.form.usrlbnom.label'] = "Pseudo";
$lang['signin.form.usrlbmai.label'] = "Votre email";

$lang['signin.form.usrlblgn.description'] = "Choisissez votre login de connexion";
$lang['signin.form.usrlbpwd.description'] = "Choisissez votre mot de passe de connexion";
$lang['signin.form.usrlbnom.description'] = "Saisissez votre nom (qui apparaitra aux autres utilisateurs)";

$lang['signin.form.done'] = "La création de votre compte s'est terminée avec succès. Veuillez vous connecter.";
$lang['signin.form.error'] = "La création de votre compte s'a pu aboutir.";

$lang['signin.form.cancel'] = "Annuler";

?>