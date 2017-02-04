using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class RecordUI : MonoBehaviour {
	[SerializeField] private AudioSource voiceSource;
	[SerializeField] private Text buttonText;
	private bool isRecording = false;

	public void OnClickRec(){
		if (isRecording) {
			isRecording = false;
			buttonText.text = "再生";
			Microphone.End (Microphone.devices [0]);
			SaveWavFile.Save ("fileName", voiceSource.clip);
		}else{
			isRecording = true;
			buttonText.text = "停止";
			voiceSource.clip = Microphone.Start (Microphone.devices [0], false, 10, 44100);
		}
	}
}
