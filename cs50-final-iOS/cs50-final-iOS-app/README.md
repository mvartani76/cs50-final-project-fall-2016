# cs50 iOS Application
There are two main files that were modified to create this application

**ViewController.swift** - File that configures Outlets/Actions/Methods

**Main.Storyboard** - File that basically configures how the screen looks

## ViewController.swift
Code for closing keyboard after pressing done button
```javascript
// Pressing the Done button closes the keyboard
    func textFieldShouldReturn(_ textField: UITextField) -> Bool {
        self.view.endEditing(true)
        
        return false
    }
```    
# iOS App Screenshots

<img src="iOS-images/cs50-final-ios-app-main-storyboard.png" width="500px" height="500px">
<img src="iOS-images/cs50-final-ios-app-screenshot.PNG" width="300px" height="500px">

# Tools / Software Used

For this code, I was using an iPhone 6s Plus with iOS 9.3, and XCode 8 with Swift 3 running on a MacBook Pro (OS X El Capitan Version 10.11.6 15 inch Mid 2012)
T
