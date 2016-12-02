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

    @IBOutlet weak var Send: UIButton!
    
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        // Do any additional setup after loading the view, typically from a nib.
        temperature.delegate = self
        light.delegate = self
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }

    // MARK: Actions
    
    @IBAction func SendValues(_ sender: UIButton) {
    
        let DeviceType = UIDevice.current.model
        
        //declare parameter as a dictionary which contains string as key and value combination.
        let parameters = ["temp1": temperature.text!, "photo1": light.text!, "DeviceType": DeviceType] as Dictionary<String, String>
        print(DeviceType)
        print(parameters)
        
        //create the url with URL
        let url = URL(string: "http://requestb.in/1d4npk81") //change the url
        
        print(url)
        
        //create the session object
        var session = Foundation.URLSession.shared
        
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
        
        print(request)
        
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
        
        
        
        //create dataTask using the session object to send data to the server
        //var task = session.dataTask(with: request as URLRequest, completionHandler: {data, response, error -> Void in
        //    print("Response: \(response)")
        //    let strData = String(data: data!, encoding: .utf8)
        //    print("Body: \(strData)")
        //    var err: Error
        //    var json = JSONSerialization.data(withJSONObject: data, options: .MutableLeaves)
            
            // Did the JSONObjectWithData constructor return an error? If so, log the error to the console
        //    if(err != nil) {
        //        println(err!.localizedDescription)
        //        let jsonStr = String(data: data, encoding: UTF8StringEncoding)
        //        println("Error could not parse JSON: '\(jsonStr)'")
        //    }
        //    else {
                // The JSONObjectWithData constructor didn't return an error. But, we should still
                // check and make sure that json has a value using optional binding.
        //        if let parseJSON = json {
                    // Okay, the parsedJSON is here, let's get the value for 'success' out of it
        //            var success = parseJSON["success"] as? Int
        //            println("Succes: \(success)")
        //        }
        //        else {
                    // Woa, okay the json object was nil, something went worng. Maybe the server isn't running?
        //            let jsonStr = String(data: data, encoding: UTF8StringEncoding)
        //            println("Error could not parse JSON: \(jsonStr)")
        //        }
        //    }
        //})
        
        //task.resume()
        
        
        
    }
    

}

