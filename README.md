# LolCompanion

Multi-purpose web application serving as a kind of hub for League of Legends players.  
Written mostly in PHP using the Codeigniter 4 framework. 
Data is gathered using Riot API(Riot Games, Inc) and a [PHP wrapper by dolejska-daniel](https://github.com/dolejska-daniel/riot-api-datadragon).  
Users register on the site using their in-game nicknames.
| ![](readme_img/logged_in_index.png) |
|:--:|
| *index page after logging in* |

Features of the web application:
- ## Summoner profile:
	![](readme_img/profile_demonstration.gif)
	- In-game rank
	- Poro bar
	- Win rate of most played champs
	- Match history
- ## Challenges

	Site moderators create and add challenges that registered users can complete and earn poros!
	Challenges are completed by fulfilling a specific task in a recent game of LoL.
	As users complete challenges they can unlock new ones.
	
	![](readme_img/challenges.png)
- ## Live game
	
	Users can see information about the game they are in right now: other players, their ranks, win rates...
	
- ## Champions
	
	All users can go into the 'Champions' tab and look for a champion or search them by name and look at a recommended build for that champion

- ## Statistics 
	
	Users can see the top champions for every role
