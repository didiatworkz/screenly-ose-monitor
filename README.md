# Screenly OSE Monitoring

![Manage Monitoring](http://www.atworkz.de/_git/monitor/manage2.png)

- [Intro](#what-is-this)
- [Features](#Features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Login](#login)


## What is this?
Screenly OSE Monitoring is a web-based application that is installed on a Screenly OSE Player at the same time. With this tool you can manage multiple OSE players with one interface.

In addition to the visual status of the player, you can also manage the assets of a player. Here it is possible to activate or deactivate them, add new ones, edit them or simply delete them.

By installing an extension it is also possible to display a "live image" of the player's output. This will then be displayed in the overview, too.

![Screenshot show](http://www.atworkz.de/_git/monitor/manage.png)

## Features

<img align="right" src="http://www.atworkz.de/_git/monitor/monitoring.png">

+ Simple administration
+ Simple overview of all players
+ Quick overview if the player is online or not
+ Extension for the output display of the player
+ Controll Assets
+ [NEW] Managing Assets
+ [NEW] Add Assets 
+ [NEW] Edit Assets
+ [NEW] New Design
+ [NEW] Monitoring Token     

---

## Requirements
+ RaspberryPi 3B+
+ Screenly OSE
+ PHP 7.x
+ SQLite 3.x
+ Ansible

## Installation
Very simple installation:

1. Connect to the player via SSH or terminal (ctrl+alt+F1)
2. Copy this line and execute it
```bash
bash <(curl -sL http://screenly-monitor.atworkz.de)
```
3. Answer the questions and installation will be start (This may take a while - Don't be afraid)
4. Done

## Login
After the installation is the default login:

http://[screenly-ip-address]:9000

Username: demo

Password: demo


![Monitoring Overview](http://www.atworkz.de/_git/monitor/screens.png)

