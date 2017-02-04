using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class WebCameraView : MonoBehaviour {
	private const int FPS = 30;
	private WebCamTexture webcamTexture;
	[SerializeField] private RawImage rawImage;

	void Start () {
		string log = "";
		WebCamDevice[] devices = WebCamTexture.devices;
		// display all cameras
		for (int i = 0; i < devices.Length; i++) {
			log = "name:" + devices [i].name + "\n" + "faceing:" + devices [i].isFrontFacing + "\n";
		}

		webcamTexture = new WebCamTexture(devices[0].name, Screen.width, Screen.height, FPS);
		rawImage.texture = webcamTexture;
		rawImage.material.mainTexture = webcamTexture;
		rawImage.color = new Color(rawImage.color.r, rawImage.color.g, rawImage.color.b, 1.0f);
		webcamTexture.Play();
	}
	
	void OnDestroy(){
		if(webcamTexture != null && webcamTexture.isPlaying){
			webcamTexture.Stop();
			webcamTexture = null;
		}
	}
}
