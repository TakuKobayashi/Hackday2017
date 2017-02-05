using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using System;
using System.IO;

public class RecordUI : MonoBehaviour {
	[SerializeField] private AudioSource voiceSource;
	[SerializeField] private Text buttonText;
	private bool isRecording = false;

	public void OnClickRec(){
		if (isRecording) {
			isRecording = false;
			buttonText.text = "再生";
			Microphone.End (Microphone.devices [0]);
			string filename = Guid.NewGuid ().ToString ();
			if (!filename.ToLower().EndsWith(".wav")) {
				filename += ".wav";
			}

			var filepath = Path.Combine(Application.persistentDataPath, filename);

			SaveWavFile.Save (filename, voiceSource.clip);
			StartCoroutine(DownloadRequest.Instance.UploadSound (filename, filepath));
		}else{
			isRecording = true;
			buttonText.text = "停止";
			voiceSource.clip = Microphone.Start (Microphone.devices [0], true, 5, 44100);
		}
	}
}
