//
//  ViewController.swift
//  cs50-final-iOS-app
//
//  Created by Michael Vartanian on 12/1/16.
//  Copyright © 2016 Michael Vartanian. All rights reserved.
//

import UIKit
import Foundation

class ViewController: UIViewController, UITextFieldDelegate {

    // MARK: Properties

    @IBOutlet weak var temperature: UITextField!
    @IBOutlet weak var light: UITextField!
    @IBOutlet weak var tempSlider: UISlider!
    @IBOutlet weak var lightSlider: UISlider!

    @IBOutlet weak var userid: UITextField!
    @IBOutlet weak var deviceid: UITextField!
    
    
    @IBOutlet weak var Send: UIButton!
    
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        // Do any additional setup after loading the view, typically from a nib.
        temperature.delegate = self
        light.delegate = self
        
        userid.delegate = self
        deviceid.delegate = self
        
        temperature.textAlignment = NSTextAlignment.center
        light.textAlignment = NSTextAlignment.center
        
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }

    // MARK: Actions
    
    @IBAction func tempSliderChanged(_ sender: UISlider) {
        temperature.text = "\(sender.value)"
        print(temperature.text!)
    }
    
    @IBAction func lightSliderChanged(_ sender: UISlider) {
        let CurrentValue = Int(sender.value)
        light.text = "\(CurrentValue)"
        print(light.text!)
    }
    
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
    
    // Pressing the Done button closes the keyboard
    func textFieldShouldReturn(_ textField: UITextField) -> Bool {
        self.view.endEditing(true)
        
        return false
    }
    
}
