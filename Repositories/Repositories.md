Repositories
============

What is a Repository?
---------------------
A Repository is the place where all your project files will go.  These files will be maintained and versioned as you change and commit them into the Repository.  A Repository can be copied (cloned) to allow multiple people to edit/add/remove resources, all at the same time.  This is very powerful, but with power comes responsibility.  Too many changes at one time, without commits, can lead to confusion.

_Commit early, Commit often, Communicate_


Create a Repository
-------------------

There are a few ways to create a repository, but a repository is always a directory.  That directory will have a special folder _".git"_.  This is where git keeps all the repository information locally.

* GitHub Create
	* Click the upper left nav bar icon of a book with a ```+```
	* Goto your profiles Repositories tab and click the big green _New_ button.

	![alt text][GitHubRepoCreate]

* GitHub Window Create
	* You can either click the ```+ create``` or drag and drop

	![alt text][GitHubWindowsRepoCreate]
	
	![alt text][GitHubWindowsRepoCreateDragDrop]

* Git Command Line Create
	* Run the _init_ command in the git shell, inside the directory you want to become a repository
	* ``` git init ```


Removing a Repository
---------------------


Working with a Repository
-------------------------

* Clone/Fork/Star/Branch....alot of terms.


* Branching is it's own beast!
	* The more branches, the more issues can arise from multiple changes and attempting to merge them together.
	* Resources
		* http://git-scm.com/book/en/Git-Branching-Basic-Branching-and-Merging
		* https://help.github.com/articles/branching-out
		* https://help.github.com/articles/merging-branches


Repository health
-----------------






Resources
---------







[GitHubRepoCreate]: images/GitHubRepoCreate.png "Web Create @GitHub"
[GitHubWindowsRepoCreate]: images/GitHubWindowsCreate.png "GUI Create @GitHubWindows"
[GitHubWindowsRepoCreateDragDrop]: images/GitHubRepoCreateDragDrop.png "GUI Drag Drop Create @GitHubWindows"