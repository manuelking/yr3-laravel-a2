![JOBFINDRlogo](https://user-images.githubusercontent.com/79155600/141016359-185bd82e-c3fb-4b52-9024-9b28f41b51bf.png) 
 
 
 
 
## JOBFINDR 
 
JOBFINDR has undergone further development over the past few months, to incorporate new functional requirements to improve its usability. These new services that the software provides make it better at facilitating and simplifying the job-hunting process.  
In the section below is a detailed overview of the changes that have been made. 
 
## Advanced Features 
  
- Searching ~ The first new feature added to JOBFINDR was the ability to search for jobs. The new feature incorporates a search box with a button and when the user enters a term into the box and selects the button a job matching the term will be displayed in the results. This has been incorporated as it greatly increases the efficiency and time of finding a desired job. Users will no longer have to browse the entire list of jobs to find one they want, they can simply sear for a job title and if there is a job vacancy for that title it will be displayed, and if not then that job isn’t currently available or yet listed on the application.

- Latest Jobs ~ The ‘latest jobs’ feature allows users to view the latest jobs added to the application. This list of jobs can be viewed without logging in the page. This gives users who are not signed up to JOBFINDR to still be able to see a few of the numerous jobs on offer. This feature was added because when JOBFINDR was initially developed, users were required to login to the application before gaining access to all the functionalities. With the addition of this new feature, all users can view a set list of jobs however they are still required to login before they can view all jobs.

- Recommendations ~ This feature gives users the ability to recommend a job. If a user likes a job because they have worked that job and have first-hand experience working with the company, they can go back and recommend the job. This feature works to boost a job listing by displaying the number of recommendations a job has. Users can sort by recommendations to get the best and most recommended jobs displayed first. The purpose of this feature was to give job seekers the ability to interact with a job listing and leave an impression if the liked the job and want to help other job seekers using the application. Its important to note that each individual user can only like a job listing once. This limit has been implemented to prevent users from manipulating the list and unnaturally boosting a job.

- Third party auth ~ This feature allows user to be able to login into the application using their login details from other applications. Signing up for some users might be time consuming and so now JOBFINDR allows users of GitHub to be able to login without signing up. The purpose of this was to improve the efficiency of signing up and to cater to all users including those who may not want to sign up but instead sign up using another account they have already set up with GitHub.

## Installation Process 

For most of the new features incorporated, there isn’t anything new you are required to do to run the application and so the installation process is very similar to before. 

The process is as follows:

Clone the repository from GitHub.

From here, extract the files from the zip to the ‘htdocs’ folder within the XAMPP folder. 

Whilst still in the XAMPP folder, proceed to open the XAMPP control panel and select ‘Shell’ to open the terminal. From here open git bash with the command, #:/git/git-bash.exe (change # to the directory of the USB drive).

Enter the folder where JOBFINDER is located with the command, cd htdocs/# (# = name of the folder). 

To get the third party authentication to work, you need to install ‘Socialite’. To do this simply enter the command, composer.phar require Laravel/socialite.  

Next, you need to configure Apache from the XAMPP control panel by selecting the ‘Config’ and ‘Apache (httpd.conf)’. You need to change the document root to the directory out of which JOBFINDR will be served. So, locate ‘DocumentRoot’ and change it to DocumentRoot "#:\xampp\htdocs\assignment02\public" as well as changing the ‘Directory’ to '<Directory "#:\xampp\htdocs\assignment02\public">' (change # to the directory of the USB drive).

Now, start Apache and MySQL and you’re ready to do. 

Go to a browser and search, /localhost.

You should now see the homepage of JOBFINDR. Sign up and login to start browsing. Your new job awaits.
 
## Using the New Features 
 
Searching on JOBFINR ~ To execute this feature select the search box and enter a term that is related to the name of a job. Press enter or select the search button and the appropriate result will be displayed. 
 
 
![jfsearch1](https://user-images.githubusercontent.com/79155600/149675092-5fbe5316-1bc0-4951-8cd5-63bbf1ef2f1d.png)
 
![jfsearch2](https://user-images.githubusercontent.com/79155600/149675111-dbfaa7e3-8491-4501-85ee-3fd84ddaa384.png)
 
Viewing the Latest Jobs Added to JOBFINDR ~  To do this simply access the application as you normally would. The latest jobs are displayed on the home page when you are both signed out and logged in. In image shown below, the user is currently logged out as you can see from the options in the navigation bar. Nevertheless, they can still view the list of latest jobs as well as being able to view each one separately. 
 
![jflastestjob1](https://user-images.githubusercontent.com/79155600/149675183-b40812de-6a7c-4043-80f7-4f1c55d88b31.png)

![jflastestjob2](https://user-images.githubusercontent.com/79155600/149675243-3aca8289-cd8e-497f-9894-7bc7c53b8ec0.png)
 
Recommending a Job – to execute this feature, select the button labelled ‘Recommend’. It is located on each individual job listing. Once this button has been selected the number at the top right corner of the job listing will increase by one, indicating that you have recommended the job. A message will also be displayed to notify the user.
 
![jfrecommend1](https://user-images.githubusercontent.com/79155600/149675426-46822a2d-c9b7-4bd2-8a91-78da85c0fe43.png)

![jfrecommend2](https://user-images.githubusercontent.com/79155600/149675444-2b24e376-50ae-4ff4-b5e8-317e66a724de.png)

![jfrecommend3](https://user-images.githubusercontent.com/79155600/149675454-deafde20-56f4-427d-a8b2-7246f8b1063a.png)

Logging in Using GitHub ~ Using GitHub to login is quick and easy. Simply select the login button on the navigation bar to go the login page if you are not there already. Select the button at the bottom labelled, ‘Login with GitHub’ and once the GitHub login form loads, proceed to enter your login details for GitHub and NOT JOBFINDR. Once complete you will be redirected to the homepage of JOBFINR where you will have full access of the application.

![jftpa1](https://user-images.githubusercontent.com/79155600/149675639-1189374a-3300-426a-bfb1-f7217efbf760.png)

![jftpa2](https://user-images.githubusercontent.com/79155600/149675645-fa5e1560-de6e-4fee-a7db-23f677774264.png)

![jftpa3](https://user-images.githubusercontent.com/79155600/149675650-b4e3d297-db92-4262-8cbb-ef30f8ad0f7e.png) 
 
## Analyzing the Recommend Feature 
 
Rationale ~

The purpose of the recommendation feature is to give a user an idea of how other people who worked a specific job felt about it, and the company that listed it. An alternative method of achieving this purpose would be to only have a review section within each job and not on the listings page. I believe this method is inferior as the recommend feature gives the user immediate feedback with almost like a score for each individual job when they arrive on this page.

Without this feature, there is no initial feedback when the user is looking at the list of jobs and the user is viewing each listing with no sense of direction. No job is the same and each user will have a different opinion experience from a job, and so with the implementation of the recommend feature you are able to give feedback and let other users know that this job could be right for them as well if it was right for you. 

An alternative method of having this kind of initial feedback would be to display the number of stars and amount of rating that the job received on the listing like the recommend feature. Whilst this method might seem like it provides more of feedback than the recommend feature, we must go back to the idea of no job is the same and each user will have a different opinion and experience. A user may give a job a rating and review that may seem positive however they would not recommend the job. Therefore, JOBFINDR incorporated the recommend feature to eliminate the possibility of this happening by unambiguously sums up and entire review into one question, whether a user recommends this job or not.

The way in which users identify the rating of a job is by the small yellow badge on the top right corner of each job listing. The bold yellow color was chosen with the intention of drawing the eyes of the user instantly when they access this page. It informs them that this piece of information being displayed is important and should be assessed. It can be clearly identified as the number of recommendations as the star icon matches the icon on the recommend button at the bottom of each listing. The rationale behind displaying this information with a badge is to show that this piece of information being displayed belongs to the job and so avoids any confusion. It also prevents the information from being overwhelming and taking up too much page real-estate yet retaining its importance. 

## Bibliography

Themesberg. (n.d.). Tailwind CSS Navbar - Flowbite. Flowbite.com. https://flowbite.com/docs/components/navbar/

Tailwind UI. (n.d.). Www.tailwindui.com. https://tailwindui.com/components/application-ui/forms/sign-in-forms

Free open source Tailwind CSS Profile Card starter template. (n.d.). Www.tailwindtoolbox.com. https://www.tailwindtoolbox.com/templates/profile-card

Themesberg. (n.d.). Tailwind CSS Cards - Flowbite. Flowbite.com. https://flowbite.com/docs/components/card/

Heroicons. (n.d.). Heroicons. https://heroicons.com/

larainfo. (n.d.). Tailwind CSS Search Examples. Larainfo.com. https://larainfo.com/blogs/tailwind-css-search-examples

Form Add Posts by joker banny | Forms, Inputs. (n.d.). Tailwindcomponents.com. Retrieved January 17, 2022, from https://tailwindcomponents.com/component/form-add-posts

## JOBFINDR Notable Mentions 
 
The JOBFINDR logo was provided under the Free License by Vecteezy at [Vecteezy.com](https://www.vecteezy.com/) 
 
The JOBFINDR README file was made using the Laravel README file as a template. 
 
The example jobs on JOBFINDR were provided by [Indeed]( https://uk.indeed.com/jobs?q=Full%20Time&l=Leeds%2C%20West%20Yorkshire&vjk=5520ebb96b39ef28). 
