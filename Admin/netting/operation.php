<?php

ob_start();
session_start();
error_reporting(E_ALL ^ E_NOTICE);  // Hide Errors

include 'connection.php';

// LOGIN

if(isset($_POST['login']))
{
	$user_username=$_POST['user_username'];
	$user_password=md5($_POST['user_password']);



	if($user_username && $user_password)
	{
		$getuser=$db->prepare("SELECT * FROM user WHERE user_username=:username and user_password=:password");
		$getuser->execute(array(
			'username'=>$user_username,
			'password'=>$user_password
		));

		 $count=$getuser->rowCount();

		 if($count>0)
		 {
			 $_SESSION['user_username']=$user_username;
	
			 header('Location:../index.php');
		 }
		 else{
			header('Location:../login.php?login=incorrect');
		 }
		
	}
}


// Admin Update

if(isset($_POST['userupdate']))
{
	$password=md5($_POST['user_password']);

	$edit=$db->prepare("UPDATE user SET
		user_username=:username,
		user_password=:password,
		user_mail=:mail,
		user_ip=:ip,
		user_lastupdate=:lastupdate
		WHERE user_id=0
		");

	$update=$edit->execute(array(
		'username'=>$_POST['user_username'],
		'password'=>$password,
		'mail'=>$_POST['user_mail'],
		'ip'=>$_POST['user_ip'],
		'lastupdate'=>$_POST['user_lastupdate'],
		));


		if($update)
		{
			header("Location:../admin.php?update=1");
		}
		else
		{
			header("Location:../admin.php?update=0");
		}	
}


// Setting Update

if(isset($_POST['setupdate']))
{

	if($_FILES['set_favicon']["size"] > 0)
	{
		$uploads_dir='../dist/img';

		$tmp_name=$_FILES['set_favicon']['tmp_name'];
		$name="favicon.ico";

	
		$imgpath=substr($uploads_dir,3)."/".$name;
		move_uploaded_file($tmp_name,"$uploads_dir/$name");

		$edit=$db->prepare("UPDATE setting SET	
			set_url=:url,
			set_title=:title,
			set_description=:description,
			set_keywords=:keywords,
			set_author=:author,
            set_favicon=:favicon,
			set_lastupdate=:lastupdate
			WHERE set_id=0
			");

		$update=$edit->execute(array(			
			'url'=>$_POST['set_url'],
			'title'=>$_POST['set_title'],
			'description'=>$_POST['set_description'],
            'keywords'=>$_POST['set_keywords'],
			'author'=>$_POST['set_author'],
			'lastupdate'=>$_POST['set_lastupdate'],
			'favicon'=>$imgpath,
			));

	

		if($update)
		{
			$imgunlink=$_POST['set_favicon'];
			unlink("$imgunlink");

			header("Location:../general.php?update=1");
		}
		else
		{
			header("Location:../general.php?update=0");
		}
			
		
	}
	else
	{
		$edit=$db->prepare("UPDATE setting SET 	
			set_url=:url,
			set_title=:title,
			set_description=:description,
			set_keywords=:keywords,
			set_author=:author,
			set_lastupdate=:lastupdate
			WHERE set_id=0
			");

		$update=$edit->execute(array(		
			'url'=>$_POST['set_url'],
			'title'=>$_POST['set_title'],
			'description'=>$_POST['set_description'],
            'keywords'=>$_POST['set_keywords'],
			'author'=>$_POST['set_author'],
			'lastupdate'=>$_POST['set_lastupdate'],
			));

	

		if($update)
		{
			header("Location:../general.php?update=1");
		}
		else
		{
			header("Location:../general.php?update=0");
		}
	}
}




// Profile Update

if(isset($_POST['profileupdate']))
{

	if($_FILES['profile_photo']["size"] > 0)
	{
		$uploads_dir='../dist/img';

		$tmp_name=$_FILES['profile_photo']['tmp_name'];
		$name="profile.jpg";

	
		$imgpath=substr($uploads_dir,3)."/".$name;
		move_uploaded_file($tmp_name,"$uploads_dir/$name");

		$edit=$db->prepare("UPDATE profile SET
			profile_name=:name,
			profile_job=:job,
			profile_school=:school,
			profile_department=:department,
			profile_country=:country,
			profile_city=:city,
			profile_mail=:mail,
			profile_aboutme=:aboutme,
			profile_lastupdate=:lastupdate,
            profile_photo=:photo
			WHERE profile_id=0
			");

		$update=$edit->execute(array(
			'name'=>$_POST['profile_name'],
			'job'=>$_POST['profile_job'],
			'school'=>$_POST['profile_school'],
			'department'=>$_POST['profile_department'],
			'country'=>$_POST['profile_country'],
			'city'=>$_POST['profile_city'],
            'mail'=>$_POST['profile_mail'],
			'aboutme'=>$_POST['profile_aboutme'],
			'lastupdate'=>$_POST['profile_lastupdate'],
			'photo'=>$imgpath,
			));

	

		if($update)
		{
			$imgunlink=$_POST['profile_photo'];
			unlink("$imgunlink");

			header("Location:../profile.php?update=1");
		}
		else
		{
			header("Location:../profile.php?update=0");
		}
			
		
	}
	else
	{
		$edit=$db->prepare("UPDATE profile SET
			profile_name=:name,
			profile_job=:job,
			profile_school=:school,
			profile_department=:department,
			profile_country=:country,
			profile_city=:city,
			profile_mail=:mail,
			profile_aboutme=:aboutme,
			profile_lastupdate=:lastupdate
			WHERE profile_id=0
			");

		$update=$edit->execute(array(
			'name'=>$_POST['profile_name'],
			'job'=>$_POST['profile_job'],
			'school'=>$_POST['profile_school'],
			'department'=>$_POST['profile_department'],
			'country'=>$_POST['profile_country'],
			'city'=>$_POST['profile_city'],
            'mail'=>$_POST['profile_mail'],
			'aboutme'=>$_POST['profile_aboutme'],
			'lastupdate'=>$_POST['profile_lastupdate'],
			));

	

		if($update)
		{
			header("Location:../profile.php?update=1");
		}
		else
		{
			header("Location:../profile.php?update=0");
		}
	}
}




// Social Update

if(isset($_POST['socialupdate']))
{

	$edit=$db->prepare("UPDATE social SET
		social_twitter=:twitter,
		social_linkedin=:linkedin,
		social_dribbble=:dribbble,
		social_behance=:behance,
		social_uplabs=:uplabs,
		social_github=:github,
		social_codepen=:codepen,
		social_stackoverflow=:stackoverflow,
		social_lastupdate=:lastupdate
		WHERE social_id=0
		");

	$update=$edit->execute(array(
		'twitter'=>$_POST['social_twitter'],
		'linkedin'=>$_POST['social_linkedin'],
		'dribbble'=>$_POST['social_dribbble'],
		'behance'=>$_POST['social_behance'],
		'uplabs'=>$_POST['social_uplabs'],
		'github'=>$_POST['social_github'],
		'codepen'=>$_POST['social_codepen'],
		'stackoverflow'=>$_POST['social_stackoverflow'],
		'lastupdate'=>$_POST['social_lastupdate'],
		));


		if($update)
		{
			header("Location:../social.php?update=1");
		}
		else
		{
			header("Location:../social.php?update=0");
		}	
}


// Api Update

if(isset($_POST['apiupdate']))
{

	$edit=$db->prepare("UPDATE api SET
		api_recaptcha=:recaptcha,
		api_maps=:maps,
		api_analytics=:analytics,
		api_lastupdate=:lastupdate
		WHERE api_id=0
		");

	$update=$edit->execute(array(
		'recaptcha'=>$_POST['api_recaptcha'],
		'maps'=>$_POST['api_maps'],
		'analytics'=>$_POST['api_analytics'],
		'lastupdate'=>$_POST['api_lastupdate'],
		));


		if($update)
		{
			header("Location:../api.php?update=1");
		}
		else
		{
			header("Location:../api.php?update=0");
		}	
}



// Home Update

if(isset($_POST['homeupdate']))
{

	$edit=$db->prepare("UPDATE home SET
		home_bgcolor=:bgcolor,
		home_navbarbgcolor=:navbarbgcolor,
		home_blogcolor=:blogcolor,
		home_namecolor=:namecolor,
		home_jobcolor=:jobcolor,
		home_mailicon=:mailicon,
		home_mailcolor=:mailcolor,
		home_aboutcolor=:aboutcolor,
		home_socialcolor=:socialcolor,
		home_lastupdate=:lastupdate
		WHERE home_id=0
		");

	$update=$edit->execute(array(
		'bgcolor'=>$_POST['home_bgcolor'],
		'navbarbgcolor'=>$_POST['home_navbarbgcolor'],
		'blogcolor'=>$_POST['home_blogcolor'],
		'namecolor'=>$_POST['home_namecolor'],
		'jobcolor'=>$_POST['home_jobcolor'],
		'mailicon'=>$_POST['home_mailicon'],
		'mailcolor'=>$_POST['home_mailcolor'],
		'aboutcolor'=>$_POST['home_aboutcolor'],
		'socialcolor'=>$_POST['home_socialcolor'],
		'lastupdate'=>$_POST['home_lastupdate'],
		));


		if($update)
		{
			header("Location:../home.php?update=1");
		}
		else
		{
			header("Location:../home.php?update=0");
		}	
}


// Article Insert


if(isset($_POST['insertarticle']))
{

	$save=$db->prepare("INSERT INTO article SET 
		article_title=:title,
		article_language=:language,
		article_author=:author,
		article_category=:category,	
		article_content=:content,
		article_keywords=:keywords
		");

	$insert=$save->execute(array(
		'title'=>$_POST['article_title'],
		'language'=>$_POST['article_language'],
		'author'=>$_POST['article_author'],
		'category'=>$_POST['article_category'],
		'content'=>$_POST['article_content'],
		'keywords'=>$_POST['article_keywords']
		));

	if($insert)
	{
		header("Location:../blog.php?insert=1");
	}
	else
	{
		header("Location:../blog.php?insert=0");
	}
}


// Article Update


if(isset($_POST['updatearticle']))
{

	$edit=$db->prepare("UPDATE article SET 
		article_title=:title,
		article_language=:language,
		article_author=:author,
		article_category=:category,	
		article_content=:content,
		article_keywords=:keywords
		WHERE article_id={$_POST['article_id']}
		");

	$update=$edit->execute(array(
		'title'=>$_POST['article_title'],
		'language'=>$_POST['article_language'],
		'author'=>$_POST['article_author'],
		'category'=>$_POST['article_category'],
		'content'=>$_POST['article_content'],
		'keywords'=>$_POST['article_keywords']
		));

		$article_id=$_POST['article_id'];

	if($update)
	{
		header("Location:../blog-edit.php?article_id=$article_id&update=1");
	}
	else
	{
		header("Location:../blog-edit.php?article_id=$article_id&update=0");
	}
}


// Delete Article

if($_GET['deletearticle']=='1')
{
	$delete=$db->prepare("DELETE article WHERE article_id=:article_id");
	$check=$delete->execute(array(
		'article_id' => $_GET['article_id']

		));

	if($check)
	{
		header("Location:../blog-list.php?delete=1");
	}
	else
	{
		header("Location:../blog-list.php?delete=0");
	}
}

// Status Article


if($_GET['articlestatus']=='1to0')
{
	$article_id=$_GET['article_id'];

	$edit=$db->prepare("UPDATE article SET
		article_status=:status
		WHERE article_id=$article_id
		");

	$update=$edit->execute(array(
		'status'=>0,	
		));


		if($update)
		{
			header("Location:../blog-list.php?update=1");
		}
		else
		{
			header("Location:../blog-list.php?update=0");
		}	
}


if($_GET['articlestatus']=='0to1')
{
	$article_id=$_GET['article_id'];

	$edit=$db->prepare("UPDATE article SET
		article_status=:status
		WHERE article_id=$article_id
		");

	$update=$edit->execute(array(
		'status'=>1,	
		));


		if($update)
		{
			header("Location:../blog-list.php?update=1");
		}
		else
		{
			header("Location:../blog-list.php?update=0");
		}	
}







?>