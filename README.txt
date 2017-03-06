For setup, I set up a virtual environment for development.
I installed VirtualBox and Vagrant from: 
https://www.virtualbox.org/wiki/Downloads
http://www.vagrantup.com/downloads.html
Also install composer

In terminal shell: 
$ vagrant box add laravel/homestead
$ git clone https://github.com/laravel/homestead.git
$ cd homestead

Boot Homestead (cd to: ~/homestead)
$ vagrant up
$ vagrant ssh

To create a new Laravel Project
$ composer create-project laravel/laravel [project-name]


Routes: 
assignment/
assignment/overview


Notes: 
For the given API in the assignment, I couldn't understand the API documentation since
it's written in Dutch. The alternative I found is from: 
https://packagist.org/packages/pragmarx/zipcode
It is able to give information on city and province, but not street

At the time of writing this, these features are still not fully implemented: 
- verification to make sure first letter of initial matches name 
  (code is commented out in RegisterController.php, still fixing error)
- for phone number, currently verifies '01' for Canadian phone numbers. However, 
  does not convert to international format when saving. 
- did not hash password for secure storage yet


