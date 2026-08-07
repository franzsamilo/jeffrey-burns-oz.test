import os
import subprocess
import imageio_ffmpeg

ffmpeg_exe = imageio_ffmpeg.get_ffmpeg_exe()
arr_dir = r"wp-content/themes/dreamsmile-child/assets/arrange"

videos = [
    "showcase-expertise.mp4",
    "testi-angela.mp4",
    "testi-danny.mp4",
    "testi-kelly.mp4",
    "testi-mike.mp4",
    "testi-ron.mp4"
]

def compress():
    for v in videos:
        in_path = os.path.join(arr_dir, v)
        if not os.path.exists(in_path):
            print(f"Skipping {v}, file not found")
            continue
        out_path = os.path.join(arr_dir, "web_" + v)
        print(f"Compressing {v}...")
        cmd = [
            ffmpeg_exe, "-y", "-i", in_path,
            "-vf", "scale=-2:720",
            "-vcodec", "libx264", "-crf", "28", "-preset", "fast",
            "-acodec", "aac", "-b:a", "128k",
            "-movflags", "+faststart",
            out_path
        ]
        res = subprocess.run(cmd, capture_output=True, text=True)
        if res.returncode == 0:
            orig_sz = os.path.getsize(in_path) / (1024*1024)
            new_sz = os.path.getsize(out_path) / (1024*1024)
            print(f"SUCCESS: {v} ({orig_sz:.1f}MB -> {new_sz:.1f}MB)")
            os.replace(out_path, in_path)
        else:
            print(f"ERROR compressing {v}: {res.stderr[:200]}")

if __name__ == "__main__":
    compress()
