# cs50 iOS Application
There are two main files that were modified to create this application

**ViewController.swift** - File that configures Outlets/Actions/Methods

**Main.Storyboard** - File that basically configures how the screen looks

## ViewController.swift

Set up Outlets (done in conjunction with Main.Storyboard)
```javascript
class ViewController: UIViewController, UITextFieldDelegate {

    // MARK: Properties
    @IBOutlet weak var temperature: UITextField!
    @IBOutlet weak var light: UITextField!
    @IBOutlet weak var tempSlider: UISlider!
    @IBOutlet weak var lightSlider: UISlider!

    @IBOutlet weak var userid: UITextField!
    @IBOutlet weak var deviceid: UITextField!
    
    
    @IBOutlet weak var Send: UIButton!
    
    ...
    
```

Configure Slider Actions
```javascript
 @IBAction func tempSliderChanged(_ sender: UISlider) {
        temperature.text = "\(sender.value)"
        print(temperature.text!)
    }
    
    @IBAction func lightSliderChanged(_ sender: UISlider) {
        let CurrentValue = Int(sender.value)
        light.text = "\(CurrentValue)"
        print(light.text!)
    }
```

Send JSON string to Platform API
```javascript
    @IBAction func SendValues(_ sender: UIButton) {
        
        //declare parameter as a dictionary which contains string as key and value combination.
        let parameters = ["temp1": temperature.text!, "photo1": light.text!, "user_id": userid.text!, "device_id": deviceid.text!] as Dictionary<String, String>
        
        //create the url with URL
        let url = URL(string: "http://cs50-final.mikevartanian.me/api/sensordata.json") //change the url
        
        //create the session object
        let session = Foundation.URLSession.shared
        
        //now create the MutableRequest object using the url object
        var request = URLRequest(url: url!)
        request.httpMethod = "POST" //set http method as POST
        
        do {
            try request.httpBody = JSONSerialization.data(withJSONObject: parameters, options: [])
        }
        catch
        {
            print(error)
        }
        
        request.addValue("application/json", forHTTPHeaderField: "Content-Type")
        request.addValue("application/json", forHTTPHeaderField: "Accept")

        let task = session.dataTask(with: request) { data, response, error in
            guard let data = data, error == nil else {
                print("error: \(error)")
                return
            }
            
            // this, on the other hand, can quite easily fail if there's a server error, so you definitely
            // want to wrap this in `do`-`try`-`catch`:
            
            do {
                if let json = try JSONSerialization.jsonObject(with: data) as? [String: Any] {
                    let success = json["success"] as? Int                                  // Okay, the `json` is here, let's get the value for 'success' out of it
                    print("Success: \(success)")
                } else {
                    let jsonStr = String(data: data, encoding: .utf8)    // No error thrown, but not dictionary
                    print("Error could not parse JSON 1: \(jsonStr)")
                }
            } catch let parseError {
                print(parseError)                                                          // Log the error thrown by `JSONObjectWithData`
                let jsonStr = String(data: data, encoding: .utf8)
                print("Error could not parse JSON 2: '\(jsonStr)'")
            }
        }
        task.resume()
    }
```
Code for closing keyboard after pressing done button
```javascript
// Pressing the Done button closes the keyboard
    func textFieldShouldReturn(_ textField: UITextField) -> Bool {
        self.view.endEditing(true)
        
        return false
    }
```

## Main.Storyboard

<img src="iOS-images/cs50-final-ios-app-main-storyboard.png" width="700px" height="500px">

# iOS App Screenshots

<img src="iOS-images/cs50-final-ios-app-screenshot.PNG" width="300px" height="500px">

# Tools / Software Used

For this code, I was using an iPhone 6s Plus with iOS 9.3, and XCode 8 with Swift 3 running on a MacBook Pro (OS X El Capitan Version 10.11.6 15 inch Mid 2012)
T
