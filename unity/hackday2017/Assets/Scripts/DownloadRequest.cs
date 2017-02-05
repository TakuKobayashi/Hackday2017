using System.Collections;
using System.Collections.Generic;
using System.IO;
using UnityEngine;
using UnityEngine.Networking;

public class DownloadRequest : SingletonBehaviour<DownloadRequest> {
	public IEnumerator GetSound() {
		UnityWebRequest request = UnityWebRequest.Get("http://example.com");
		// 下記でも可
		// UnityWebRequest request = new UnityWebRequest("http://example.com");
		// methodプロパティにメソッドを渡すことで任意のメソッドを利用できるようになった
		// request.method = UnityWebRequest.kHttpVerbGET;

		// リクエスト送信
		yield return request.Send();

		// 通信エラーチェック
		if (request.isError) {
			Debug.Log(request.error);
		} else {
			if (request.responseCode == 200) {
				// バイナリデータとして取得する
				byte[] results = request.downloadHandler.data;
			}
		}
	}

	public IEnumerator UploadSound(string filename, string filepath) {
		FileStream fs = new FileStream(filepath, System.IO.FileMode.Open, System.IO.FileAccess.Read);
		byte[] bs = new byte[fs.Length];
		//ファイルの内容をすべて読み込む
		fs.Read(bs, 0, bs.Length);
		Debug.Log (bs.Length);
		//ファイルを読み込むバイト型配列を作成する
		List<IMultipartFormSection> form = new List<IMultipartFormSection>();
		form.Add(new MultipartFormFileSection("upload", bs, filename, "audio/wav"));
		Debug.Log (filename);

		using(UnityWebRequest www = UnityWebRequest.Post("http://kimini.xyz/Api_post/up_voice/", form)) {
			yield return www.Send();

			if (www.isError) {
				Debug.Log(www.error);
			} else {
				Debug.Log("Form upload complete!");
				Debug.Log (www.downloadHandler.text);
			}
		}
	}
}
